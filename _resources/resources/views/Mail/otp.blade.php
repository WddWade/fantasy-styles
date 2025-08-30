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
                        <td align="center" valign="middle" width="100%" style="border-bottom: 1px solid #cccccc;"><a href="javascript:;"><img src="https://{{request()->server('HTTP_HOST')}}/dist/assets/img/logo.svg'" alt=""></a></td>
                      </tr>
                    </tbody>
                  </table>
                  <!-- ORDER LIST -->
                  <table width="100%" border="0" style="padding: 50px 15% 0px">
                    <tbody>
                      <!-- 訂單明細 -->
                      <tr>
                        <td>
                          <!-- CONGRATULATIONS -->
                          <table width="100%" border="0">
                            <tr>
                              <td align="center" style="padding-bottom: 20px;"><b style="font-size:28px;">您的 OTP 驗證碼 - 登入網站管理後台</b></td>
                            </tr>
                          </table>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                  <!-- INFORMATION -->
                  <table width="100%" border="0" style="padding: 0px 15% 50px">
                    <tbody>
                      <tr>
                        <td>
                          <table width="100%" border="0">
                            <tr>
                                <td align="center">
                                    <p style="margin: 0; font-size: 14px; padding-bottom: 10px;"><b>親愛的使用者，為了保護您的帳戶安全，請使用以下一次性密碼（OTP）進行登入</b></p>
                                </td>
                            </tr>
                          </table>
                          <table bgcolor="#efefef" width="100%" border="0" cellpadding="20">
                            <tr>
                                <td align="center">
                                    <p style="margin: 0; font-size: 14px; padding-bottom: 10px;">
                                        <b>OTP驗證碼</b></p>
                                    <p style="margin: 0; font-weight: 600; font-size: 24px; letter-spacing: 1.2px;padding-bottom: 5px;">
                                        <b>{{$code}}</b></p>
                                </td>
                            </tr>
                          </table>
                          <table width="100%" border="0">
                            <tr>
                                <td align="center">
                                    <p style="margin: 0; font-size: 14px; padding-top: 10px;"><b>此驗證碼有效期為 5 分鐘。請在有效期內使用，並妥善保管此碼以確保您的帳戶安全。</b></p>
                                </td>
                            </tr>
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
                          <table width="100%" border="0" cellpadding="0" cellspacing="0" style="font-size: 14px; text-align: center; color: #e3304d;">
                            <tbody>
                              <tr>
                                <td><b>提醒您本信件為系統發送，請勿直接回覆。</b></td>
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
