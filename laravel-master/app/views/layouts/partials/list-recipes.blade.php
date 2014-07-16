<div class="container-fluid text-left">

@foreach ($recipes as $recipe)

    <div style="margin: 6px; border: 1px solid #e7e7e7; width: 300px; float:left;">
        <div>
          <img src="photos/{{ $recipe->id }}.jpg" style="width:298px; height: 298px;" />
        </div>
        <div class="container" style="font-family: Roboto Condensed; font-weight: 400;width:100%;">
          <div style="font-size:18px;height: 81px;padding: 6px 0 6px 0;border-bottom: 1px solid #e7e7e7;color:#2e2e2e;">
            {{ $recipe->name }}
            <span style="font-size: 13px; float:left; color: #6f6f6f;width: 100%;">
              by {{ $recipe->author }}
            </span>
            <div style="clear:both;">
            </div>
          </div>
          <div style="color:#7b7b7b;font-size:13px; font-weight: 700;padding: 6px 0 6px 0;border-bottom: 1px solid #e7e7e7;color:#2e2e2e;">

            {{ $recipe->calories }} <span style="font-weight: 400;">calories</span>
          </div>
          <div style="font-size:14px;padding: 6px 0 6px 0;color:#2e2e2e;">

             <i class="fa fa-heart" style="color: #d86804;"></i> {{ $recipe->yums }}
          </div>
        </div>
    </div>

@endforeach

</div>
