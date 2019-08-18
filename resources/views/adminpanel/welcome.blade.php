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

                <hr>
                <button class="ticket btn btn-success" style="margin: 5px; width: 100%;">En çok kullanılan  10 Hastag</button>
                <div class="clearfix"></div>
                <div class="displaynone" style="display: none">
                    @foreach($hastagList as $hastag)
                <span class="badge badge-pill badge-primary"><a href="/adminpanel/keyword-find/{{$hastag->name}}"> {{$hastag->name}}</a></span>
                        @endforeach
                </div>
                    <script>
                    $(document).ready(function(){
                        $(".ticket").click(function(){
                            $(".displaynone").toggle(200);
                        });

                    });
                </script>
                <hr>

                <script>
                    $('#tokenfield').tokenfield({
                        autocomplete: {
                            source: ['red','blue','green','yellow','violet','brown','purple','black','white'],
                            delay: 100
                        },
                        showAutocompleteOnFocus: true
                    })
                </script>
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

                    @foreach($lastTenTicketList as $value)
                        <tr>

                            <td>{{$value->subject}}</td>
                            <td>{{$value->question_description}}</td>
                            <td>{{$value->emergency_status}}</td>
                            <td>{{$value->transaction_status}}</td>
                            <td>
                                <a href="/adminpanel/ticket-edit/{{$value->id}}" class="btn btn-success">Yanıtla</a>
                                <a   onclick="return confirm('Emin misiniz ? ');" href="/adminpanel/ticket-delete/{{$value->id}}" class="btn btn-danger">Sil</a>
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
            <div class="">
                <hr>
                <label><strong>7 Günden Fazla Açık Kalan Ticketlar </strong></label>
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

                    @foreach($more7Days as $value)
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