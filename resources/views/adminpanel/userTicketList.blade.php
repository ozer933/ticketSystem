@include('adminpanel.adminpanelmaster')

<style>
    .color td {
        background-color: #5cb85c;
        color: white !important;
        font-weight: bolder;
    }

    th {
        color: black!important;
        font-weight: bolder;
    }

    table {
        border-color: #ccc;
        border: 1px solid #ccc;
    }

    body td {
        color: black!important;
    }
</style>
<div class="content-mid">
    <div class="jumbotron">
        <div class="middle-content">
            <div class="">



            </div>
            <div class="">
                <hr>
                <label><strong>Açtığınız Ticketlar </strong></label>
                <hr>
                <table id="example" class="display" style="width:100%; ">
                    <thead>
                    <tr>
                        <th>Konu</th>
                        <th>Açıklama</th>
                        <th>Aciliyet</th>
                        <th>Durumu</th>
                        <th>İşlem</th>

                    </tr>
                    </thead>
                    <tbody>

                    @foreach($ticketList as $value)
                        <tr>

                            <td>{{$value->subject}}</td>
                            <td>{{$value->question_description}}</td>
                            <td>{{$value->emergency_status}}</td>
                            <td>{{$value->transaction_status}}</td>
                            <td>
                                <a href="/adminpanel/ticket-edit/{{$value->id}}" class="btn btn-success">Yanıtla</a>
                                <a onclick="return confirm('Emin misiniz ? ');" href="/adminpanel/ticket-delete/{{$value->id}}" class="btn btn-danger">Sil</a>
                            </td>


                        </tr>
                    @endforeach


                    </tbody>
                    <tfoot>
                    <tr>
                        <th>Konu</th>
                        <th>Açıklama</th>
                        <th>Aciliyet</th>
                        <th>Durumu</th>
                        <th>İşlem</th>

                    </tr>
                    </tfoot>
                </table>
            </div>

            <hr>



            <!-- start content_slider -->

            </section>
            <!--Section: Live preview-->

        </div>

        <script>
            $('#example').dataTable();
            $('#example2').dataTable();
        </script>
    </div>
    <div class="clearfix"> </div>
</div>
<!----->
<div class="content-bottom">
    <div class="col-md-6 post-top"> </div>
    <div class="clearfix"> </div>
</div>
<!--//content-->
<!---->
</div>
<div class="clearfix"> </div>
</div>
</div>
@include('adminpanel.footer');

</body>

</html>