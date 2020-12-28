<?php get_header(); ?>

<body>
    <div class="d-flex flex-wrap">
            
        <div id="thongbao">
        </div>
        <div class="modal fade" id="exampleModal" tabindex="-1" >
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Bạn phải nhập thông tin</h5>
                        
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                    <div class="sttmsg"></div>
                        <form class="form_contact" id="form_contact" >
                            <div class="form-group">
                                <label for="name" class="col-form-label">Tên</label>
                                <input type="text" class="form-control" id="name">
                            </div>
                            <div class="form-group">
                                <label for="phone-number" class="col-form-label">Số điện thoại:</label>
                                <input type="number" class="form-control" id="phone-number">
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary">Đóng</button>
                        <button type="button" class="btn btn-primary btn_send">Gửi thông tin</button>
                    </div>
                </div>
            </div>
        </div>
        <div id="wheel" class="d-end">
            <table cellpadding="0" cellspacing="0" border="0">
                <tr>
                    <td width="438" height="582" class="the_wheel" align="center" valign="center">
                        <canvas id="canvas" width="434" height="434">
                            <p style="{color: white}" align="center">Sorry, your browser doesn't support canvas. Please try another.</p>

                        </canvas>
                        <div id="border_outside"></div>
                        <div class="btn_quay">

                            <div id="spin_button"  ></div>
                        </div>
                    </td>
                </tr>
            </table>
        </div>
    </div>

    <?php get_footer() ?>