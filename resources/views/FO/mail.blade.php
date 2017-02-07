@if($type=='email_reset')
<a href="{{url('confirmation', [$conf->id, $conf->uniqid])}}">Confirmare</a>
@elseif($type=='password_reset')
<a href="{{url('passwordreset', [$conf->id, $conf->uniqid])}}">Confirmare</a>
@elseif($type=='confirm_account')
<a href="{{url('accountconfirmation', [Crypt::encrypt($conf->id)])}}">Confirmare</a>
@endif
