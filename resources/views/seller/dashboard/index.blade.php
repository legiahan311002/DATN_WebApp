@extends('seller.layouts.app')
@section('title', 'Trang người bán')
@section('content')

@php
session_start();
@endphp

<!-- Main content -->
<section class="content">
   <div class="container-fluid">
      @include('seller.layouts.alert')

      <!-- Small boxes (Stat box) -->
      <div class="row">
         <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
               <div class="inner">
                  <h3>{{ $productCount }}<sup style="font-size: 20px">Sản phẩm</sup></h3>

                  <p>Tổng sản phẩm</p>
               </div>
               <div class="icon">
                  <i class="ion ion-bag"></i>
               </div>
               <a href="/seller1/products/list" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
         </div>
         <!-- ./col -->
         <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
               <div class="inner">
                  <h3>{{ $orderDetailCount }}<sup style="font-size: 20px">Đơn</sup></h3>

                  <p>Số lượng đơn hàng</p>
               </div>
               <div class="icon">
                  <i class="ion ion-stats-bars"></i>
               </div>
               <a href="/seller1/orders/list" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
         </div>
         <!-- ./col -->
         <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
               <div class="inner">
                  <h3>{{ number_format($revenue, 0, ',', '.') }}<sup style="font-size: 20px">VND</sup></h3>
                  <p>Doanh thu</p>
               </div>
               <div class="icon">
                  <i class="ion ion-person-add"></i>
               </div>
               <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
         </div>
         <!-- ./col -->
         <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
               <div class="inner">
                  <h3>{{ number_format($totalVoucher, 0, ',', '.') }}<sup style="font-size: 20px">VND</sup></h3>
                  <p>Số tiền trả lại từ voucher</p>
               </div>
               <div class="icon">
                  <i class="ion ion-pie-graph"></i>
               </div>
               <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
         </div>
         <!-- ./col -->
      </div>
      <!-- /.row -->
   </div>
   <!-- /.content -->
   @endsection