@extends('email.template')

@section('title')
 Konfirmasi Pendaftaran Member - {{$config->name}}
@endsection

@section('description')
	Konfirmasi Pendaftaran Akun Member Anda
@endsection

@section('header')
	Email Konfirmasi Pendaftaran Akun Member Anda
@endsection

@section('content')
	<tr mc:hideable>
	<td align="center" valign="top">
		<!-- CENTERING TABLE // -->
		<table border="0" cellpadding="0" cellspacing="0" width="100%" bgcolor="#0098ee">
			<tr>
				<td align="center" valign="top">
					<!-- FLEXIBLE CONTAINER // -->
					<table border="0" cellspacing="0" width="500" class="flexibleContainer">
						<tr>
							<td valign="top" width="500" class="flexibleContainerCell"  style="padding:8px 30px 8px 30px;">

								<!-- CONTENT TABLE // -->
								<table align="left" border="0" cellpadding="0" cellspacing="0" width="100%">
									<tr>
										<td align="left" valign="top" class="flexibleContainerBox">
											<table border="0" cellpadding="0" cellspacing="0" width="210" style="max-width: 100%;">
												<tr>
													<td align="left" class="textContent">
														<h5 mc:edit="header" style="color:#ffde93;line-height:125%;font-family:Helvetica,Arial,sans-serif;font-size:14px;font-weight:normal;margin-top:0;margin-bottom:3px;text-align:left;">
															Tipe Email
														</h5>
														<div mc:edit="body" style="text-align:left;font-family:Helvetica,Arial,sans-serif;font-size:12px;margin-bottom:0;color:#FFF;line-height:135%;">Konfirmasi Pendaftaran</div>
													</td>
												</tr>
											</table>
										</td>
										<td align="right" valign="middle" class="flexibleContainerBox">
											<table class="flexibleContainerBoxNext" border="0" cellpadding="0" cellspacing="0" width="210" style="max-width: 100%;">
												<tr>
													<td align="left" class="textContent">
															<h5 mc:edit="header" style="color:#ffde93;line-height:125%;font-family:Helvetica,Arial,sans-serif;font-size:14px;font-weight:normal;margin-top:0;margin-bottom:3px;text-align:left;">
															Tanggal email
														</h5>
														<div mc:edit="body" style="text-align:left;font-family:Helvetica,Arial,sans-serif;font-size:12px;margin-bottom:0;color:#FFF;line-height:135%;">{{tgl_indo($member->created_at)}}</div>
													</td>
												</tr>
											</table>
										</td>
									</tr>
								</table>
								<!-- // CONTENT TABLE -->

							</td>
						</tr>
					</table>
					<!-- // FLEXIBLE CONTAINER -->
				</td>
			</tr>
		</table>
		<!-- // CENTERING TABLE -->
	</td>
</tr>
<tr mc:hideable>
	<td align="center" valign="top">
		<!-- CENTERING TABLE // -->
		<table border="0" cellpadding="0" cellspacing="0" width="100%"  >
			<tr>
				<td align="center" valign="top">
					<!-- FLEXIBLE CONTAINER // -->
					<table border="0" cellpadding="30" cellspacing="0" width="500" class="flexibleContainer">
						<tr>
							<td valign="top" width="500" class="flexibleContainerCell">

								<!-- CONTENT TABLE // -->
								<table align="left" border="0" cellpadding="0" cellspacing="0" width="100%">
									<tr>
										<td align="left" valign="top" class="flexibleContainerBox">
											<table border="0" cellpadding="0" cellspacing="0" style="width: 90%;">
												<tr>
													<td align="left" class="textContent">
														<h3 style="color:#140B09;line-height:125%;font-family:Helvetica,Arial,sans-serif;font-size:20px;font-weight:normal;margin-top:0;margin-bottom:8px;text-align:left;">
															{{ucwords($member->Name)}}
														</h3>
														<div style="text-align:left;font-family:Helvetica,Arial,sans-serif;font-size:13px;margin-bottom:0;color:#251714;line-height:135%;">
															<table cellpadding="3">
																<tr>
																	<td width="120">Email </td>
																	<td>{{$member->Email}}</td>
																</tr>
																{{--<tr>--}}
																	{{--<td width="120">Nomor Telepon</td>--}}
																	{{--<td>{{$member->phone}}</td>--}}
																{{--</tr>--}}
																{{--<tr>--}}
																	{{--<td width="120">Jenis Kelamin</td>--}}
																	{{--<td>{{($member->gender=="P") ? 'Perempuan' : 'Laki - Laki'}}</td>--}}
																{{--</tr>--}}
																{{--<tr>--}}
																	{{--<td width="120">Alamat</td>--}}
																	{{--<td>{{$member->address}}</td>--}}
																{{--</tr>--}}
															</table>
														</div>
														<a href="{{base_url('member/confirmation/'.$member->CodeActivation)}}" style="margin-top:20px;margin-bottom:20px;font-size:14px;text-align:center;color:#fff;background:#0098ee;padding:20px;width:100%;display:block;" target="_blank">
															KLIK DISINI UNTUK KONFIRMASI
														</a>
														<div style="margin-top:20px;margin-bottom:20px;font-size:12px;width:100%;text-align:center;border:1px dashed#ccc;padding:20px;color:#333;background:#eee">
															Manual Link : {{base_url('member/confirmation/'.$member->CodeActivation)}}
														</div>
													</td>
												</tr>
											</table>
										</td>
									</tr>
								</table>
								<!-- // CONTENT TABLE -->

							</td>
						</tr>
					</table>
					<!-- // FLEXIBLE CONTAINER -->
				</td>
			</tr>
		</table>
		<!-- // CENTERING TABLE -->
	</td>
</tr>


@endsection