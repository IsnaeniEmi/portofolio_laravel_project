<html>

  <head>
    <style>
      .footer {
        text-align: center;
        padding: 20px 0;
        color: #aaaaaa;
        font-size: 12px;
      }
    </style>
  </head>

  <body>
    <div class="container">
      <div class="header">
        <h1>Hi, {{ $nama_lengkap }}</h1>
      </div>
      <div class="content">
        <p>Thank you for getting in touch with us. Here is the message we received from you:</p>
        <p>{!! $pesan !!}</p>
      </div>
      <div class="footer">
        <!-- Footer content here -->
      </div>
    </div>
  </body>

</html>
