@extends('frontend.layouts.app')
@section('content')
<!--// Mini Header \\-->
		<div class="wm-mini-header">
			<span class="wm-blue-transparent"></span>
			 <div class="container">
			    <div class="row">
				    <div class="col-md-12">
				        <div class="wm-mini-title">
				       		<h1>Hồ sơ sinh viên</h1> 
				        </div>
				        <div class="wm-breadcrumb">
				          	<ul>
				          	 	<li><a href="index-2.html">Trang chủ</a></li>
				          	 	<li><a href="#">Sinh viên</a></li>
				           		<li>Hồ sơ</li>
				          	</ul>
				        </div>      
				    </div>
			    </div>
			</div>    
		</div>
  		<!--// Mini Header \\-->

		<!--// Main Content \\-->
		<div class="wm-main-content">

			<!--// Main Section \\-->
			<div class="wm-main-section">
				<div class="container">
					<div class="row">
						<aside class="col-md-4">
							<div class="wm-student-dashboard-nav">
								<div class="wm-student-nav" id="wm-student-nav">
									<figure>
										<a href="#"><img src="{{asset('uploads/student/'.$student->avatar.'')}}" alt="" id="avatar"></a>
									</figure>
									<div class="wm-student-nav-text" id="wm-student-nav-text">
										<h6>Hoàng Hà</h6>
										<p>MSV 20IT423</p>
                                        <p>Lớp 20SE6</p>
                                        <p>Khóa 2020-2025</p>
									</div>
									<ul>
                                        <li class="active">
											<a href="#">
												<i class="wmicon-avatar"></i>
												Xuất lý lịch
											</a>
										</li>
									</ul>
								</div>
							</div>														
						</aside>
						<div class="col-md-8">
							<div class="wm-student-settings-info">							
								<div class="wm-student-dashboard-settings">
									<div class="wm-plane-title">
										<h4>Thông tin cá nhân</h4>
									</div>
									<form>
										<ul>
											<li>
                                                <label>Họ và tên</label>
                                                <input type="text" id="input" value="Hoàng Hà" readonly>
                                            </li>
											<li>
                                                <label>Ngày sinh</label>
                                                <input type="text" id="input" value="23-05-2002" readonly>
                                            </li>
											<li>
                                                <label>Quê quán</label>
                                                <input type="text" id="input" value="Quảng Bình" readonly>
                                            </li>
											<li>
                                                <label>Giới tính</label>
                                                <input type="text" id="input" value="Nam" readonly>
                                            </li>
                                            <li>
                                                <label>Dân tộc</label>
                                                <input type="text" id="input" value="Kinh" readonly>
                                            </li>
                                            <li>
                                                <label>Tôn giáo</label>
                                                <input type="text" id="input" value="Không" readonly>
                                            </li>
                                            <li>
                                                <label>Số CMND</label>
                                                <input type="text" id="input" value="048202000296" readonly>
                                            </li>
											<li>
                                                <label>Đoàn thể</label>
                                                <input type="text" id="input" value="17-12-2017" readonly>
                                            </li>																	 
		                                </ul>
									</form>
								</div>
                                <div class="wm-student-dashboard-settings">
									<div class="wm-plane-title">
										<h4>Thường trú và địa chỉ</h4>
									</div>
									<form>
										<ul>
											<li>
                                                <input type="text" id="input" value="K41/25 Đặng Thùy Trâm" readonly>
                                            </li>																 
		                                </ul>
									</form>
								</div>
                                <div class="wm-student-dashboard-settings">
									<div class="wm-plane-title">
										<h4>Thông tin liên hệ</h4>
									</div>
									<form>
										<ul>
											<li>
                                                <label>Email</label>
                                                <input type="text" id="input" value="hoangha2352@gmail.com" readonly>
                                            </li>	
                                            <li>
                                                <label>Điện thoại</label>
                                                <input type="text" id="input" value="0935386494" readonly>
                                            </li>																 
		                                </ul>
									</form>
								</div>
							</div>
						</div>					
					</div>
				</div>
			</div>
			<!--// Main Section \\-->

		</div>
		<!--// Main Content \\-->
        <style>
			#wm-student-nav{
				background-color: #F5FBFD;
			}
            #avatar{
                height: 120px;
                border-radius: 50%;
            }
            #input{
                font-style: normal;
            }
        </style>
@endsection