<!DOCTYPE html>
<html>
<head>
    <meta charset="ISO-8859-1">
    <style>

        html, body {
            width: 23cm;
            height: 13.5cm;
            display: block;
            font-family: "Consolas";
            margin:0;
        }
        table{
            width:100%;
            display:inline;
            font-size:13px;
            border-collapse: collapse;
        }
        .box-body{
            padding:10px;
            font-size:13px;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
        }
        th {
            text-align: left;
        }
        @media print {
            html, body {
                width: 23cm;
                height: 13.5cm;
                display: block;
                font-family: "Consolas";
                padding:0 10px;
                margin:0;
            }
            table{
                width:100%;
                display:inline;
                font-size:13px;
                border-collapse: collapse;
            }
            .box-body{
                padding:10px;
                font-size:13px;
            }

            @page {
                size: 24cm 14cm;
            }
        }
    </style>
</head>
<body>
    <div class="box-body">
        <table>
            <thead>
                <tr>
                    <th style="width:350px;">Supplier Name</th>
                    <th style="width:200px;">Transaction Code:</th>
                    <th style="width:200px;"><?php echo $details[0]->id;?></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?php echo $details[0]->supplier_name;?></td>
                    <td>Date of Purchase:</td>
                    <td><?php echo date("d-m-Y H:i:s",strtotime($details[0]->date));?></td>
                </tr>
            </tbody>
        </table>
        <br />
        <?php $line = "==================================================================================================================";?>
        <?php echo $line;?>
        <table>
            <thead>
                <tr>
                    <th style="width:160px;">Product Name</th>
                    <th style="width:100px;">Category</th>
                    <th style="width:100px;">Quantity (KG) </th>
                    <th style="width:200px;">Price/KG</th>
                    <th style="width:100px;text-align: right;">Subtotal</th>
                </tr>
            </thead>
            <tbody>
                <?php if(isset($details) && is_array($details)){ ?>
                    <?php foreach($details as $transaksi){?>
                        <tr>
                            <td><?php echo $transaksi->product_name;?></td>
                            <td><?php echo $transaksi->category_name;?></td>
                            <td><?php echo $transaksi->quantity;?></td>
                            <td><?php echo '$'.number_format($transaksi->price_item);?></td>
                            <td style="text-align: right;"><?php echo '$'.number_format($transaksi->subtotal);?></td>
                        </tr>
                    <?php } ?>
                <?php } ?>
            </tbody>
        </table>
        <?php echo $line;?>
        <table>
            <tfoot>
                <tr>
                    <th style="width:560px;text-align: right;" colspan="4">Total</th>
                    <th style="width:100px;text-align: right;"><?php echo '$'.number_format($transaksi->total_price);?></th>
                </tr>
            </tfoot>
        </table>
        <?php echo $line;?>
        <br />
        <table>
            <thead>
                <tr>
                    <th style="width:180px;text-align: center;">Buyer</th>
                    <th style="width:180px;text-align: center;">Introduction</th>
                    <th style="width:180px;text-align: center;">Best Regards</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td></td>
                    <td></td>
                    <td style="width:180px;text-align: center;">&nbsp;</td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td style="text-align: center;">(.............)</td>
                    <td style="text-align: center;">(.............)</td>
                    <td style="text-align: center;">(.............)</td>
                </tr>
            </tbody>
        </table>
    </div>
</body>
</html>
