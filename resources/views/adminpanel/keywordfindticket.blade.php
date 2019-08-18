@include('adminpanel.adminpanelmaster')
<div class="content-mid">
    <div class="jumbotron">
        <div class="middle-content">
            <div class="">


                <label><strong>Son Açılan 10 Ticket </strong></label>
                <hr>
                <table id="example2" class="display" style="width:100%; ">
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

                    @foreach($getHastagFindTicket as $Ticket)
                        <tr>

                            <td>{{$Ticket->subject}}</td>
                            <td>{{$Ticket->question_description}}</td>
                            <td>{{$Ticket->emergency_status}}</td>
                            <td>{{$Ticket->transaction_status}}</td>
                            <td>
                                <a href="/adminpanel/ticket-edit/{{$Ticket->id}}" class="btn btn-success">Yanıtla</a>
                                <a   onclick="return confirm('Emin misiniz ? ');" href="/adminpanel/ticket-delete/{{$Ticket->id}}" class="btn btn-danger">Sil</a>
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