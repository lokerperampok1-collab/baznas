<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\QurbanPackage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminCampaignController extends Controller
{
    public function index()
    {
        $packages = QurbanPackage::latest()->get();
        return view('admin.purno.index', compact('packages'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'type' => 'required|string',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        $data = $request->only(['name', 'price', 'type', 'description']);
        
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $imageFolder = date('Y/m');
            
            $image->move(public_path('uploads/' . $imageFolder), $imageName);
            
            $data['image_folder'] = $imageFolder;
            $data['image_name'] = $imageName;
        }

        QurbanPackage::create($data);

        return redirect()->back()->with('success', 'Paket kurban berhasil ditambahkan!');
    }

    public function update(Request $request, $id)
    {
        $package = QurbanPackage::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'type' => 'required|string',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        $data = $request->only(['name', 'price', 'type', 'description']);

        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($package->image_folder && $package->image_name) {
                $oldPath = public_path('uploads/' . $package->image_folder . '/' . $package->image_name);
                if (file_exists($oldPath)) {
                    @unlink($oldPath);
                }
            }

            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $imageFolder = date('Y/m');
            
            $image->move(public_path('uploads/' . $imageFolder), $imageName);
            
            $data['image_folder'] = $imageFolder;
            $data['image_name'] = $imageName;
        }

        $package->update($data);

        return redirect()->back()->with('success', 'Paket kurban berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $package = QurbanPackage::findOrFail($id);
        
        if ($package->image_folder && $package->image_name) {
            $path = public_path('uploads/' . $package->image_folder . '/' . $package->image_name);
            if (file_exists($path)) {
                @unlink($path);
            }
        }

        $package->delete();

        return redirect()->back()->with('success', 'Paket kurban berhasil dihapus!');
    }

    public function toggleStatus($id)
    {
        $package = QurbanPackage::findOrFail($id);
        $package->is_active = !$package->is_active;
        $package->save();

        return redirect()->back()->with('success', 'Status paket berhasil diubah!');
    }
}
