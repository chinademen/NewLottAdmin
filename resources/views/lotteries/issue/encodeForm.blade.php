@foreach ($aSeriesLotteries as $key => $aLotteryLists)
    <ul  class="list-inline">
            @foreach ($aLotteryLists as $lkey=>$lval)
            <?php
            $sClass = 'btn ' . ($lkey == $iLotteryId ? 'btn-danger' : 'btn-success');
            ?>
            <li ><a class="{{ $sClass }}" href="{{ route('issues.encode', $lkey) }}">{{ $lval }}</a></li>
            @endforeach
    </ul>
@endforeach

@if ($oLatestIssue)
<table  class="table table-striped table-hover table-bordered">
    <thead style="background: #FFE4E4">
        <tr>
            <th>{{ __($sLangPrev . 'game') }}</th>
            <th>{{ __($sLangPrev . 'issue') }}</th>
            <th>{{ __($sLangPrev . 'draw-periods') }}</th>
            <th>{{ __($sLangPrev . 'status') }} </th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>{{ $aLotteries[$oLatestIssue->lottery_id] }}</td>
            <td class="issue-box">{{ $oLatestIssue->issue }}</td>
            <td class="betime-box">{{ date('Y-m-d H:i:s', $oLatestIssue->begin_time) . ' - ' .  date('Y-m-d H:i:s', $oLatestIssue->end_time) }}</td>
            <td class="fstatus-box">{{ $oLatestIssue->formatted_status }}</td>
        </tr>
    </tbody>
</table>

<form action="{{ route('issues.encode') }}" method="post"  class="form-inline col-md-offset-3" autocomplete="off" >
    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
    <input type="hidden" name="lottery_id" value="{{ $oLatestIssue->lottery_id }}" />
    <input type="hidden" name="issue" value="{{ $oLatestIssue->issue }}" />

    <div class="form-group has-success">
        <label class="sr-only" for="exampleInputAmount">{{ __('_issue.wn_number') }}</label>
        <div class="input-group">
          <div class="input-group-addon input-lg"><font class="text-danger"> {{ $oLatestIssue->issue }} </font>{{ __('_issue.wn_number') }}</div>
          <input type="text" class="form-control input-lg" style="height:57px; font-size:24px; text-align: center; width:380px;" id="wn_number" name="wn_number" value="{{-- Input::old('wn_number') --}}"/>
          <div class="input-group-addon input-lg"><button type="submit" class="btn btn-success">{{ __('Submit') }}</button></div>
        </div>
      </div>
</form>
@endif