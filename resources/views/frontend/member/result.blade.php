@extends('frontend.layouts.app')
@section('content')
<!--// Mini Header \\-->
<div class="wm-mini-header">
			<span class="wm-blue-transparent"></span>
			 <div class="container">
			    <div class="row">
				    <div class="col-md-12">
				        <div class="wm-mini-title">
				       		<h1>Kết quả học tập</h1> 
				        </div>
				        <div class="wm-breadcrumb">
				          	<ul>
				          	 	<li><a href="index-2.html">Trang chủ</a></li>
				          	 	<li><a href="#">Sinh viên</a></li>
				           		<li>Kết quả học tập</li>
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
						<div class="col-md-12">
							<div class="wm-student-dashboard-statement wm-dashboard-statement">
								<div class="wm-plane-title">
									<h4>Điểm tổng kết</h4>
									<hr>
									<table class="wm-article">
										<thead>
											<th>#</th>
											<th>Học kỳ</th>
											<th>Số TC-ĐK</th>
											<th>Số TC-ĐK Mới</th>
											<th>Điểm 4</th>
											<th>Điểm 10</th>
											<th>Điểm HB</th>
											<th>TC TL HK</th>
											<th>Xếp loại</th>
											<th>Điểm 4 TL</th>
											<th>Điểm 10 TL</th>
											<th>TC tích lũy</th>
										</thead>
										<tbody>
											
											<tr>
												<td>1</td>
												<td>HK1, năm 2023-2024</td>
												<td>2</td>
												<td>2</td>
												<td>
													<b>
														<code class="classification">3.62</code>
													</b>
												</td>
												<td>8.9</td>
												<td>8.2</td>
												<td>17</td>
												<td>
													<b>
														<code class="classification">Xuất sắc</code>
													</b>
												</td>
												<td>115</td>
												<td>154</td>
												<td>155</td>
											</tr>
										</tbody>
									</table>
									<hr>
									<h4>Điểm các lớp học phần</h4>
									<p id="note">Để xem điểm thành phần, sau khi GV xác nhận nhập điểm đồng 
										thời Phòng KT&ĐBCLGD chốt điểm với với bản chính, sinh viên 
										phải thực hiện đánh giá lớp học phần và sự cần thiết của học 
										phần.
									</p>
									<hr>
                                    <table class="wm-article">
                                        <thead>
                                            <th>STT</th>
                                            <th>Tên học phần</th>
                                            <th>Số TC</th>
                                            <th>Lần học</th>
                                            <th>Điểm CC / GVHD</th>
                                            <th>Điểm bài tập</th>
                                            <th>Điểm giữa kì</th>
                                            <th>Điểm cuối kì / Đồ án</th>
                                            <th>Điểm T10</th>
                                            <th>Điểm chữ</th>
                                        </thead>
                                        <tbody>
											<tr>
												<td>1</td>
												<td>Quản trị dự án phần mềm</td>
												<td>2</td>
												<td>1</td>
												<td>10</td>
												<td>9</td>
												<td>9</td>
												<td>9</td>
												<td>9.5</td>
												<td>A</td>
											</tr>
                                        </tbody>
                                    </table>							
								</div>
							</div>
                        </div>
					</div>
				</div>
			</div>
			<!--// Main Section \\-->
			<div id='show'></div>
            <!--// Main Section \\-->
		</div>
		<!--// Main Content  #2A3F54\\-->
        <style>
            thead {
				background-color: #73879C;
				color: white;
				font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
			}
			#td{
				border-left: none;
				border-right: none;
				padding: 10px;
			}
			#td-left{
				border-left: none;
				border-right: none;
				padding: 10px;
				text-align: left;
			}
			.tr{
				background-color: #f9f9f9;
			}
			tr.tr:hover{
				background-color: rgba(38,185,154,.07);
			}
			.semester{
				font-weight: bold;
				color: black;
				background-color: #d3f1d3;
			}
			#note{
				font-size: 14px;
				text-align: center;
				color: #73879C;
			}
			.classification{
				padding: 2px 4px;
				color: #c7254e;
				background-color: #f9f2f4;
				border-radius: 4px;
			}
			.success_score{
				color: #008000;
			}
			.danger_score{
				color: red;
			}
			.primary_score{
				color: blue;
			}
			.basic_score{
				color: #73879C;
			}
			.warning_score{
				color: orange;
			}
			.btn-success{
				background: #26B99A;
    			border: 1px solid #169F85;
			}
        </style>
		<script>
			$(document).ready(function() {
				$.ajaxSetup({ 
					headers: { 
						'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') 
					} 
                });
			});
		</script>
@endsection		