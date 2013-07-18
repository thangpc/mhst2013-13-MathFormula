<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('convert_string')) {
    
    function convert_string($str = '') {
    	$res = '';
    	switch ($str) {
			case 'sim-luc-quy':
				$res = 'Sim Lục Quý';
				break;
			case 'sim-ngu-quy':
				$res = 'Sim Ngũ Quý';
				break;
			case 'sim-tu-quy':
				$res = 'Sim Tứ Quý';
				break;
			case 'sim-tam-hoa':
				$res = 'Sim Tam Hoa';
				break;
			case 'sim-taxi-2':
				$res = 'Sim Taxi 2';
				break;
			case 'sim-taxi-3':
				$res = 'Sim Taxi 3';
				break;
			case 'sim-taxi-4':
				$res = 'Sim Taxi 4';
				break;
			case 'sim-tien-don':
				$res = 'Sim Tiến Đơn';
				break;
			case 'sim-tien-doi':
				$res = 'Sim Tiến Đôi';
				break;
			case 'sim-loc-phat':
				$res = 'Sim Lộc Phát';
				break;
			case 'sim-than-tai':
				$res = 'Sim Thần Tài';
				break;
			case 'sim-ong-dia':
				$res = 'Sim Ông Địa';
				break;
			case 'sim-kep':
				$res = 'Sim Kép';
				break;
			case 'sim-lap':
				$res = 'Sim Lặp';
				break;
			case 'sim-ganh':
				$res = 'Sim Gánh';
				break;
			case 'sim-soi-guong':
				$res = 'Sim Soi Gương';
				break;
			case 'sim-nam-sinh-dd-mm-yy':
				$res = 'Sim Năm Sinh dd/mm/yy';
				break;
			case 'sim-nam-sinh-19xx':
				$res = 'Sim Năm Sinh 19xx';
				break;
			case 'sim-dac-biet':
				$res = 'Sim Đặc Biệt';
				break;
			case 'sim-dau-so-co':
				$res = 'Sim Đầu Số Cổ';
				break;
			case 'status-order-0':
				$res = 'Đang chờ';
				break;
			case 'status-order-1':
				$res = 'Đã giao dịch';
				break;
			case 'status-order-2':
				$res = 'Đã huỷ';
				break;
			case 'page-1':
				$res = 'Chọn số miễn phí';
				break;
			case 'page-2':
				$res = 'Giới thiệu';
				break;
			case 'page-3':
				$res = 'Phong thuỷ';
				break;
			case 'page-4':
				$res = 'Khuyến mãi';
				break;
			case 'page-5':
				$res = 'Hướng dẫn mua sim';
				break;
			case 'page-6':
				$res = 'Thanh toán';
				break;
			case 'page-7':
				$res = 'Liên hệ';
				break;	
			default:
				# code...
				break;
		}
		return $res;
    }
}