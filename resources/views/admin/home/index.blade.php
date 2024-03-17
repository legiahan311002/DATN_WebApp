@extends('admin.layouts.app')
@section('title', 'Trang admin')
@section('content')

@php
    session_start();
@endphp

<!-- Main content -->
<section class="content">
   <div class="container-fluid">
      @include('admin.layouts.alert')

      <!-- Small boxes (Stat box) -->
      <div class="row">
         <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
               <div class="inner">
                  <h3>{{$countShop}}<sup style="font-size: 20px">Cửa hàng</sup></h3>

                  <p>Tổng số lượng của hàng</p>
               </div>
               <div class="icon">
                  <i class="ion ion-bag"></i>
               </div>
               <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
         </div>
         <!-- ./col -->
         <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
               <div class="inner">
                  <h3>{{$countBuyer}}<sup style="font-size: 20px">người</sup></h3>

                  <p>Tổng số lượng người mua</p>
               </div>
               <div class="icon">
                  <i class="ion ion-stats-bars"></i>
               </div>
               <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
         </div>
         <!-- ./col -->
         <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
               <div class="inner">
                  <h3>{{ number_format($totalOrder, 0, ',', '.') }}<sup style="font-size: 20px">đ</sup></h3>

                  <p>Tổng phí dịch vụ</p>
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
                  <h3>{{ number_format($totalVoucher, 0, ',', '.') }}<sup style="font-size: 20px">đ</sup></h3>

                  <p>Tổng tiền chi trả voucher SeaSide</p>
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