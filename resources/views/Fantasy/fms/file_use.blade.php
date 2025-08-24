<div class="backEnd_quill">
    <div class="detailEditor">
        <div class="editorBody">
            <div class="editorHeader">
                <div class="info">
                    <div class="title">
                        <p>{!! $area_title !!}</p>
                    </div>
                    <div class="area">
                        <div class="control">
                            <ul class="btnGroup">
                                <li class="remove">
                                    <a href="javascript:;" class="close_btn">
                                        <span class="fa fa-remove"></span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="editorContent">
                <table class="file_use_table">
                    <tr>
                        <td><span>單元</span></td>
                        <td><span>使用次數</span></td>
                    </tr>
                    @foreach($FmsFileUse as $val)
                    <tr>
                        <td><a class="link" target="_blank" href="{{ url('/Fantasy/'.$CmsNode.'/'.$val['branch']['url_title'].'/'.$val['locale'].'/unit/'.$val['cms_menu']['id'].'/'.$val['data_id']) }}">{{$val['model_path']}}</a></td>
                        <td><span class="count">{{$val['count']}}</span></td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</div>
