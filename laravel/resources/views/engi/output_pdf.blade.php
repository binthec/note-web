<html lang="ja">
<head>
    <title>pdf output test</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <style>
        @font-face{
            font-family: ipaexg;
            font-style: normal;
            font-weight: normal;
            src: url("{{ storage_path('fonts/ipaexg.ttf') }}") format('truetype');
        }
        @font-face{
            font-family: ipaexg;
            font-style: bold;
            font-weight: bold;
            src: url("{{ storage_path('fonts/ipaexg.ttf') }}") format('truetype');
        }
        body {
            font-family: ipaexg !important;
            line-height: 80%;
        }
        .main_image {
            width: 100%;
            text-align: center;
            margin: 10px 0;
        }
        .main_image img{
            width: 90%;
        }
        .sushiTable {
            border: 1px solid #000;
            border-collapse: collapse;
            width: 50%;
        }
        .sushiTable tr th{
            background: #87cefa;
            padding: 5px;
            border: 1px solid #000;
        }
        .sushiTable tr td{
            padding: 5px;
            border: 1px solid #000;
        }

    </style>
</head>
<body>
{{ $engi->title }}
<br>





</body>
</html>
