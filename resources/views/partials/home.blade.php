
<div role="main" class="main">
    <section class="page-header page-header-modern bg-color-light-scale-1 page-header-md ">
        <div class="container-fluid">
            <div class="row align-items-center">

                <div class="col">
                    <div class="row">
                        <div class="col-md-12 align-self-center p-static order-2 text-center">
                            <div class="overflow-hidden pb-2">
                                <div class="text-dark font-weight-bold text-3 ">联系方式：上海宝山区宝钢一村26号201室 &nbsp;&nbsp; 服务热线：13795375098 ( 王雷 ) &nbsp;&nbsp; 传真：021-56129586 &nbsp;&nbsp; 公司网站: www.xy-100.com</div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <div class="container py-2">

        <div class="row">
            <div class="col-lg-9">
                <table id="table_id" class="display">
                    <thead id="table_head">
                        <tr>
                            <th>Action</th>
                            <th>证明</th>
                            <th>品名</th>
                            <th>库存变动缘由</th>
                            <th>规格</th>
                            <th>材质</th>
                            <th>支数（支）</th>
                            <th>重量（吨）</th>
                            <th>长度（米/支）</th>
                            <th>生产厂家</th>
                            <th>备注</th>
                        </tr>
                    </thead>
                    <tbody id="datatable">
                        @if ($data)
                            @foreach( $data as $val )
                                <tr id='row-{{$val->id}}'>
                                    <td style='text-align: center;'>
                                        <button type="button" rel="tooltip" onclick="openModal({{$val->id}})" id="btn_edit" class="btn btn-success btn-round btn-just-icon btn-sm" >
                                            Edit
                                        </button>
                                    </td>
                                    <td>
                                        <?php 
                                            $img_urls = explode('|', $val->img_url); 
                                            array_pop($img_urls);

                                            foreach ($img_urls as $key => $img_url) {
                                        ?>
                                            <img class="proof-img" onclick="proofImageModal(this)" src="https://{{$img_url}}"/>
                                        <?php 
                                        }
                                        ?>
                                    </td>
                                    <td>{{$val->name}}</td>
                                    <td>
                                        @if ($val->amount_change == 0) 最终
                                        @endif
                                    </td>
                                    <td>{{$val->standard}}</td>
                                    <td>{{$val->material}}</td>
                                    <td>{{$val->count}}</td>
                                    <td>{{$val->weight}}</td>
                                    <td>{{$val->length}}</td>
                                    <td>{{$val->manufacture}}</td>
                                    <td>{{$val->note}}</td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
            <!-- The Modal -->
            <div id="myModal" class="proof-modal">
                <span class="close">&times;</span>
                <img class="proof-modal-content" id="img01">
            </div>

            <div class="col-lg-3">
                <aside class="sidebar">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" onclick="openModal(-1)">
                        Data Add
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="dataModalScrollable" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-scrollable" role="document">
                            <div class="modal-content">
                            <div class="modal-header align-items-center">
                                <h5 class="modal-title" id="exampleModalScrollableTitle">Data Registion</h5>
                            </div>
                            <div class="modal-body">
	                            {!! Form::open(['class' => 'mb-4', 'url' => '/submit', 'id' => 'submitModal', 'data-toggle' => 'validator', 'enctype' => 'multipart/form-data']) !!}
                                    <div class="form-group row align-items-center">
                                        <label class="col-sm-3 text-left text-sm-right mb-0">品名</label>
                                        <div class="col-sm-9">
                                            {!! Form::text('name', '', ['class' => 'form-control', 'placeholder' => '品名...', 'required']) !!}
                                        </div>
                                    </div>
                                    <div class="form-group row align-items-center">
                                        <label class="col-sm-3 text-left text-sm-right mb-0">规格</label>
                                        <div class="col-sm-9">
                                            {!! Form::text('standard', '', ['class' => 'form-control', 'placeholder' => '规格...', 'required']) !!}
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 text-left text-sm-right mb-0">材质</label>
                                        <div class="col-sm-9">
                                            {!! Form::text('material', '', ['class' => 'form-control', 'placeholder' => '材质...', 'required']) !!}
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 text-left text-sm-right mb-0">支数</label>
                                        <div class="col-sm-9">
                                            {!! Form::text('count', '', ['class' => 'form-control', 'pattern' => '^\d+(?:\d{1,5})?$', 'maxlength' => '15', 'placeholder' => '（支）...']) !!}
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 text-left text-sm-right mb-0">重量</label>
                                        <div class="col-sm-9">
                                            {!! Form::text('weight', '', ['class' => 'form-control', 'pattern' => '^\d+(?:\.\d{1,5})?$', 'maxlength' => '15', 'placeholder' => '（吨）...', 'required']) !!}
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 text-left text-sm-right mb-0">长度</label>
                                        <div class="col-sm-9">
                                            {!! Form::text('length', '', ['class' => 'form-control', 'pattern' => '^\d+(?:\.\d{1,5})?$', 'maxlength' => '15', 'placeholder' => '（米/支）...']) !!}
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 text-left text-sm-right mb-0">生产厂家</label>
                                        <div class="col-sm-9">
                                            {!! Form::text('manufacture', '', ['class' => 'form-control', 'placeholder' => '生产厂家...', 'required']) !!}
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 text-left text-sm-right mb-0">备注</label>
                                        <div class="col-sm-9">
                                            {!! Form::text('note', '', ['class' => 'form-control', 'placeholder' => '...']) !!}
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 text-left text-sm-right mb-0">Proof Document</label>
                                        <div class="col-sm-9">
                                            <input id="image" name="image[]" type="file" class="file" data-show-preview="false" multiple require>
                                            <span id="alertP"></span>
                                        </div>
                                    </div>
                                    
                                    <button type="submit" id="cargoSubmit" class="d-none">Submit</button>
	                            {!! Form::close() !!}
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" id="cargoRegist" class="btn btn-primary">Save changes</button>
                            </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal fade" id="editModalScrollable" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-scrollable" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalScrollableTitle">Data Modify</h5>
                            </div>
                            <div class="modal-body">
                                {!! Form::open(['class' => 'mb-4', 'url' => '/update', 'id' => 'editModal', 'data-toggle' => 'validator', 'enctype' => 'multipart/form-data']) !!}
                                    {!! Form::hidden('id', '', ['class' => 'form-control']) !!}
                                    <div class="form-group row align-items-center">
                                        <label class="col-sm-3 text-left text-sm-right mb-0">品名</label>
                                        <div class="col-sm-9">
                                            {!! Form::text('name', '', ['class' => 'form-control', 'placeholder' => '品名...', 'disabled' => 'disabled', 'required']) !!}
                                            {!! Form::hidden('name', '', ['class' => 'form-control']) !!}
                                        </div>
                                    </div>
                                    <div class="form-group row align-items-center">
                                        <label class="col-sm-3 text-left text-sm-right mb-0">库存变动缘由</label>
                                        <div class="col-sm-9" id="update_amount">
                                            {!! Form::select('amount_change', array('2' => '出库', '1' => '入库'), ['class' => 'form-control']) !!}
                                        </div>
                                    </div>
                                    <div class="form-group row align-items-center">
                                        <label class="col-sm-3 text-left text-sm-right mb-0">规格</label>
                                        <div class="col-sm-9">
                                            {!! Form::text('standard', '', ['class' => 'form-control', 'placeholder' => '规格...', 'required']) !!}
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 text-left text-sm-right mb-0">材质</label>
                                        <div class="col-sm-9">
                                            {!! Form::text('material', '', ['class' => 'form-control', 'placeholder' => '材质...', 'required']) !!}
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 text-left text-sm-right mb-0">支数（支）</label>
                                        <div class="col-sm-2">
                                            {!! Form::text('count_show', '', ['class' => 'form-control', 'disabled' => 'disabled' ]) !!}
                                            {!! Form::hidden('count_show', '', ['class' => 'form-control']) !!}
                                        </div>
                                        <div class="col-sm-7">
                                            {!! Form::text('count', '', ['class' => 'form-control', 'id' => 'count', 'pattern' => '^\d+(?:\d{1,5})?$', 'maxlength' => '15', 'placeholder' => '（支）...']) !!}
                                            <span id="alert"></span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 text-left text-sm-right mb-0">重量（吨）</label>
                                        <div class="col-sm-2">
                                            {!! Form::text('weight_show', '', ['class' => 'form-control', 'disabled' => 'disabled' ]) !!}
                                            {!! Form::hidden('weight_show', '', ['class' => 'form-control']) !!}
                                        </div>
                                        <div class="col-sm-7">
                                            {!! Form::text('weight', '', ['class' => 'form-control', 'id' => 'weight', 'pattern' => '^\d+(?:\.\d{1,5})?$', 'maxlength' => '15', 'placeholder' => '（吨）...', 'required']) !!}
                                            <span id="alertW"></span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 text-left text-sm-right mb-0">长度（米/支）</label>
                                        <div class="col-sm-2">
                                            {!! Form::text('length_show', '', ['class' => 'form-control', 'disabled' => 'disabled' ]) !!}
                                            {!! Form::hidden('length_show', '', ['class' => 'form-control']) !!}
                                        </div>
                                        <div class="col-sm-7">
                                            {!! Form::text('length', '', ['class' => 'form-control', 'id' => 'length', 'pattern' => '^\d+(?:\.\d{1,5})?$', 'maxlength' => '15', 'placeholder' => '（米/支）...']) !!}
                                            <span id="alertL"></span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 text-left text-sm-right mb-0">生产厂家</label>
                                        <div class="col-sm-9">
                                            {!! Form::text('manufacture', '', ['class' => 'form-control', 'placeholder' => '生产厂家...', 'required']) !!}
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 text-left text-sm-right mb-0">备注</label>
                                        <div class="col-sm-9">
                                            {!! Form::text('note', '', ['class' => 'form-control', 'placeholder' => '...']) !!}
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 text-left text-sm-right mb-0">Proof Document</label>
                                        <div class="col-sm-9">
                                            <input id="updateImage" name="updateImage[]" type="file" class="file" data-show-preview="false" multiple required="">
                                            <span id="alertPU"></span>
                                        </div>
                                    </div>
                                    <button type="submit" id="updateSubmit" class="d-none">Submit</button>
	                            {!! Form::close() !!}
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" id="cargoUpdate" class="btn btn-primary">Save changes</button>
                            </div>
                            </div>
                        </div>
                    </div>
                    <!-- ...End Modal -->

                    <!-- Date Picker -->
                    <div class="date-picker">               
                        <span>Choose Date:</span>    
                        <input type="text" name="daterange"/>
                        <span id='undo_basic' onclick="undoBasic()"><i class="fa fa-undo"></i></span>
                    </div>

                    <!-- ...End Date Picker -->

                    <h5 class="font-weight-bold"><strong></strong></h5>
                    <ul class="nav nav-list flex-column sort-source mb-5 date-list" data-sort-id="portfolio" data-option-key="filter" >
                    </ul>
                </aside>
            </div>
        </div>

    </div>

</div>