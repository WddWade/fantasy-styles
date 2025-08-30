<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;600&display=swap" rel="stylesheet">
  </head>
<body style="margin:0;padding:0;font-family: 'Poppins', sans-serif, Microsoft JhengHei">
  <table bgcolor="#efefef" cellpadding="0" cellspacing="0" width="100%" style="padding:88px 10px">
    <tbody>
      <tr>
        <td width="900" style="max-width:900px">
          <table width="900" border="0" cellspacing="0" cellpadding="0" align="center" valign="top">
            <tbody>
              <tr>
                <td width="auto" align="center" valign="top" bgcolor="#fff" style="background-color:#ffffff;box-shadow: 0px 0px 30px rgba(0, 0, 0, 0.2)">
                  <!-- HEADER -->
                  <table width="100%" border="0" cellpadding="30">
                    <tbody>
                      <tr>
                        <td align="center" valign="middle" width="100%" style="border-bottom: 1px solid #cccccc;"><a href="javascript:;"><img src="{{$mailData['logo']}}" alt=""></a></td>
                      </tr>
                    </tbody>
                  </table>
                  <!-- ORDER LIST -->
                  <table width="100%" border="0" style="padding: 50px 15% 30px">
                    <tbody>
                      <!-- 訂單明細 -->
                      <tr>
                        <td>
                          <!-- CONGRATULATIONS -->
                          <table width="100%" border="0">
                            <tr>
                              <td align="center" style="padding-bottom: 20px;"><b style="font-size: 28px;font-weight: 600;letter-spacing: 1.2px">{{$mailData['header_en']}} </b><b style="font-size:28px;">{{$mailData['header_tw']}}</b></td>
                            </tr>
                            <tr>
                              <td align="center" style="padding-bottom: 30px;">
                                <img src="img/calendar_icon.png" alt="">
                              </td>
                            </tr>
                          </table>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                  <!-- INFORMATION -->
                  <table width="100%" border="0" style="padding: 0px 15% 15px">
                    <tbody>
                      <tr>
                        <td>
                          <!-- 一欄資訊 -->
                          <table width="100%" style="padding: 30px 10% 15px; border-top: 2px solid #000;">
                            <tbody>
                              <tr>
                                <td>
                                  <table width="100%" border="0" cellpadding="0" cellspacing="0" style="padding-bottom : 12px">
                                    <tbody>
                                      <tr>
                                        <td><b>Information 資訊</b></td>
                                      </tr>
                                    </tbody>
                                  </table>
                                  @foreach($mailData['data'] as $val)
                                  <table width="100%" border="0" cellpadding="0" cellspacing="0" style="font-size: 14px;padding-bottom : 12px">
                                    <tbody>
                                      <tr>
                                        <td><b>{{$val['label']}}：</b>{{$val['value']}}</td>
                                      </tr>
                                    </tbody>
                                  </table>
                                  @endforeach
                                </td>
                              </tr>
                            </tbody>
                          </table>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                  <!-- FOOTER -->
                  <table width="100%" border="0" style="padding: 40px 15% 60px; border-top: 1px solid #cccccc;">
                    <tbody>
                      <tr>
                        <td>
                          <table width="100%" cellspacing="0" cellpadding="0">
                            <tr>
                              <td align="center">
                                <table cellspacing="0" cellpadding="0">
                                  <tr>
                                    <td width="200" align="center" style="border-radius: 25px;" bgcolor="#0FD0B9">
                                      <a href="https://{{request()->server('HTTP_HOST')}}/Fantasy" target="_blank" style="width:160px;text-align: center;padding: 14px 20px;border-radius: 25px;font-family: Helvetica, Arial, sans-serif;font-size: 14px; color: #ffffff;text-decoration: none;font-weight:bold;display: inline-block;">
                                        <b>Manage 管理後台</b>
                                      </a>
                                    </td>
                                  </tr>
                                </table>
                              </td>
                            </tr>
                          </table>
                          <table width="100%" border="0" cellpadding="0" cellspacing="0" style="font-size: 14px; text-align: center; padding-top: 30px; color: #e3304d;">
                            <tbody>
                              <tr>
                                <td><b>提醒您本信件為系統發送，請勿直接回覆，</b></td>
                              </tr>
                            </tbody>
                          </table>
                          <table width="100%" border="0" cellpadding="0" cellspacing="0" style="font-size: 14px; text-align: center; padding: 5px;">
                            <tbody>
                              <tr>
                                <td><b>請至官網確認正式的聯繫管道，謝謝。</b></td>
                              </tr>
                            </tbody>
                          </table>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </td>
              </tr>
            </tbody>
          </table>
        </td>
      </tr>
    </tbody>
  </table>
</body>
</html>
