<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>INVOICE</title>
</head>
<body>
    <div class="container">
        <h1 style="text-align: center; padding-top: 15px;">INVOIC PESANAN</h1>
        <h2 style="margin-right:50px; margin-top: 10px;">No.Faktur : 100000</h2>
        <hr>

        <table>
            <tr>
                <td>No. Transaksi</td>
                <td>:</td>
                <td></td>
                
            </tr>
        </table>



    </div>
    
</body>
</html> -->

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Data PDF</title>
  </head>
  <body>
      
    <div class="container">
        <h2 style="text-align: center; padding-top: 15px;">INVOICE PESANAN</h2>
        <h6 style="margin-right:50px; margin-top: 20px;">No.Faktur : {{$pesanan->no_transaksi}}</h6>
        <h6 style="margin-right:50px; margin-top: 20px;">Tanggal : {{date('d/m/Y')}}</h6>
        <hr size="3">

        <div class="row mt-5">
            <div class="col-md-6">
                <table>
                    
                    <tr>
                        <td>No. Transaksi</td>
                        <td></td>
                        <td></td>
                        <td></td>
                       
                        <td style="padding: 15px;">:</td>
                        <td>{{$pesanan->no_transaksi}}</td>
                        
                    </tr>
                </table>
            </div>
            <div class="col-md-6">
            <table style="float: right;">
                    
                    <tr>
                        <td>Tanggal Transaksi</td>
                        
                        <td style="padding: 15px;">:</td>
                        <td>{{$pesanan->tanggal}}</td>
                        
                    </tr>
            </table>
            </div>
        </div>

        <table >                   
            <tr>
                <td>Nama Pemesan</td>
                <td></td>
                <td style="padding: 15px;">:</td>
                <td>{{$pesanan->nama_pemesan}}</td>
                        
            </tr>
            <tr>
                <td>Jenis Pesanan</td>
                <td></td>
                <td style="padding: 15px;">:</td>
                <td></td>
                        
            </tr>
        </table>
        <table id="dinamic" style="width:100%; margin-top: 15px;" border="1">
            <thead class="text-center">
                <tr>
                    <th class="text-center">No</th>                                             
                    <th>JENIS PESANAN</th>
                    <th>HARGA</th>
                    <th>JUMLAH</th>
                    <th>TOTAL</th>
                    <th>KETERANGAN</th>
                </tr>                                                           
            </thead>
            <tbody id="tbody" class="text-center" style="text-align: center;">
                @php
                    $a = 1;
                @endphp
                @foreach ($jenis_pesanan as $i)
                <tr>
                    <td>{{$a++}}</td>
                    <td>{{$i->barang->nama_barang}}</td>
                    <td>{{number_format($i->harga,0,',','.')}}</td>
                    <td>{{$i->jumlah}}</td>
                    <td>{{number_format($i->total,0,',','.')}}</td>
                    <td>{{$i->keterangan}}</td>                                     
                </tr>  
                @endforeach                               
            </tbody>
            <tfoot class="text-center" style="text-align: center;">
                 <tr>
                    <td colspan="3" class="text-center">Total</td>
                    <td>{{$pesanan->total_jumlah}}</td>
                    <td>{{number_format($pesanan->total_harga,0,',','.')}}</td>
                    <td>-</td>
                       
                </tr>
             </tfoot>
        </table>

        
        

        

          

    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>