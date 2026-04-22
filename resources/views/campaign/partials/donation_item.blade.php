<div class="donation_inner_box" style="background:rgb(250, 252, 255); margin-bottom: 10px; border-radius: 8px; border: 1px solid #f0f4f8;">
    <div class="donation_name" style="font-weight: bold; color: #333;">{{ $dn->name }}<span class="donation_time" style="font-weight: normal; color: #999; font-size: 12px; margin-left: 10px;"><span class="dashicons dashicons-clock"></span>{{ $dn->created_at->diffForHumans() }} </span>
    </div>
    <div class="donation_total" style="font-size: 14px; color: #666; margin-top: 5px;">Berdonasi sebesar <b style="color: #259148;">Rp {{ number_format($dn->total_nominal, 0, ',', '.') }}</b></div>
</div>
