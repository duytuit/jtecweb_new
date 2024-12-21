<style>
    html {
        margin: 0;
        padding: 0;
    }

    body {
        font-family: 'Noto Sans CJK JP', sans-serif;
    }

    table {
        border-collapse: collapse;
        width: 100%;
        height: 200px;
        font-size: 12px;
        margin-bottom: 75px;
    }

    .table-bordered td,
    .table-bordered th {
        border: 1px solid black;
        font-size: 12px;
    }

    .left,
    .right,
    .center {
        width: 50%;
        display: flex;
        font-size: 12px;
    }

    .content_text {
        font-weight: bold;
        font-size: 18px;
        flex: 1;
    }

    .title_text {
        line-height: 1.75;
        width: 60px;
    }

    .title_text_center {
        line-height: 1.65;
    }
</style>
@php
     use App\Models\Department;
@endphp
<div class="product">
    @foreach ($edps as $item)
     @php
         $employee = $item->employee;
         $confirm_form = json_decode($item->confirm_form);
         $department =  Department::findById($item->required_department_id);
         $content_form = str_replace("?","_",$item->content_form);
     @endphp
    <table class="table-bordered">
        <tr>
            <td>
                    <div>Mã sản phẩm</div>
                    <div style="font-size: 18px;font-weight: bold">{{$item->code}}</div>
            </td>
            <td>
                    <div>Lot</div>
                    <div style="font-size: 18px;font-weight: bold">{{$confirm_form->lot_no}}</div>
            </td>
            <td>
                    <div>Số lượng</div>
                    <div>{{$item->quantity}}</div>
            </td>
            <td>
                    <div>Ghi chú YC</div>
                    <div>{{$item->content}}</div>
            </td>
            <td>
                    <div>Người YC</div>
                    <div>{{@$employee->first_name . ' ' . @$employee->last_name }}</div>
                    <div>{{ @$item->created_at }}</div>
            </td>
        </tr>
        <tr>
                <td colspan="4" width="84%">
                    <div style="display: flex">
                        <div class="left">
                            <div class="title_text_center">
                                <div>Chủng loại:</div>
                                <div>Kích thước:</div>
                            </div>
                            <div class="content_text">
                                <div>{{substr($confirm_form->edp->sensyu,1)}}</div>
                                <div>{{$confirm_form->edp->sentyo}}</div>
                            </div>
                        </div>
                        <div class="center">
                            <div class="title_text_center">
                                <div>Số dây:</div>
                                <div>Tên mối nối:</div>
                            </div>
                            <div class="content_text">
                                <div> {{$confirm_form->edp->senban}}</div>
                                <div> {{$confirm_form->edp->jointgb != " " ? $confirm_form->edp->jointgb:'---'}}</div>
                            </div>
                        </div>
                        <div class="right">
                            <div class="title_text_center">
                                <div>Kích thước sau xoắn:</div>
                                <div>Dây xoắn cùng:</div>
                                <div>Maku dây:</div>
                            </div>
                            <div class="content_text">
                                <div>{{$confirm_form->edp->twist2 != " " ? $confirm_form->edp->twist2 : '---'}}</div>
                                <div>{{$confirm_form->edp->twist1 != " " ? $confirm_form->edp->twist1 : '---'}}</div>
                                <div>{{$confirm_form->edp->markno != " " ? $confirm_form->edp->markno : '---'}}</div>
                            </div>
                        </div>
                    </div>
                </td>
                <td  rowspan="2">
                    <div>
                        <img src="data:image/png;base64, {!! base64_encode(QrCode::format('png')->size(100)->generate($content_form)) !!} ">
                    </div>
                </td>
            </tr>
            <tr>
                <td colspan="2" width="42%">
                    <div style="border-bottom: 1px solid black;text-align: center">Đầu A</div>
                    <div style="display: flex">
                        <div class="title_text">
                            <div>Tanshi:</div>
                            <div>Sỏ gôm:</div>
                            <div>Chuốt:</div>
                            <div>Ghi chú:</div>
                        </div>
                        <div>
                            <div class="content_text">
                                <div>{{$confirm_form->edp->tascda !=" "? substr($confirm_form->edp->tascda, 1): '-'}}</div>
                                <div>{{$confirm_form->edp->gumcda !=" "? substr($confirm_form->edp->gumcda,1): '-'}}</div>
                                <div>{{$confirm_form->edp->kawaa !=" " ? $confirm_form->edp->kawaa : '-'}}</div>
                            </div>
                            <div>{{$confirm_form->edp->infomeia1 != " " ? $confirm_form->edp->infomeia1 : '-'}}{{$confirm_form->edp->infomeia2 != " " ? $confirm_form->edp->infomeia2 : '-'}}</div>
                        </div>
                    </div>
                </td>
                <td colspan="2" width="42%">
                    <div style="border-bottom: 1px solid black;text-align: center">Đầu B</div>
                    <div style="display: flex">
                        <div class="title_text">
                            <div>Tanshi:</div>
                            <div>Sỏ gôm:</div>
                            <div>Chuốt:</div>
                            <div>Ghi chú:</div>
                        </div>
                        <div>
                            <div class="content_text">
                                <div>{{$confirm_form->edp->tascdb !=" "? substr($confirm_form->edp->tascdb, 1): '-'}}</div>
                                <div>{{$confirm_form->edp->gumcdb !=" "? substr($confirm_form->edp->gumcdb,1): '-'}}</div>
                                <div>{{$confirm_form->edp->kawab !=" " ? $confirm_form->edp->kawab : '-'}}</div>
                            </div>
                            <div>{{$confirm_form->edp->infomeib1 != " " ? $confirm_form->edp->infomeib1 : '-'}}{{$confirm_form->edp->infomeib2 != " " ? $confirm_form->edp->infomeib2 : '-'}}</div>
                        </div>
                    </div>
                </td>
            </tr>
    </table>
    @endforeach
</div>

