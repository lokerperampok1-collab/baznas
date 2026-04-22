<div class="donation_inner_box" style="margin-bottom: 15px; border-bottom: 1px solid #f0f0f0; padding-bottom: 15px;">
    <div class="donation_name" style="font-weight: bold;">{{ $dn->name }}<span class="donation_time" style="font-weight: normal; color: #999; font-size: 12px; margin-left: 10px;"><span class="dashicons dashicons-clock"></span>{{ $dn->created_at->diffForHumans() }} </span>
    </div>
    <div class="donation_comment" style="color: #555; font-style: italic; margin-top: 5px;">"{{ $dn->comment }}"<br></div>
    <div class="donation_love" style="margin-top: 10px;">
        <div class="fancy-button">
          <div class="box_love">
              <img alt="Image" src="{{ asset('assets/icons/praying-color3.png') }}">
              <div class="total_love"><span>{{ rand(10, 50) }} Aaminn</span></div>
          </div>
        </div>
    </div>
</div>
