@include('adminpanel.adminpanelmaster') @php error_reporting(0) @endphp
<div class="col-md-12">
    <button class="togglee btn btn-success float-right " style="margin: 5px;">Yanıtla</button> <span class="float-right" style="margin: 5px;"><button class="btn btn-success">Aciliyet:{{ $activeEmergencyStatus }} </button> <button class="btn btn-success"> Ticket Durumu:  {{$activeTransactionStatus}}</button></span> </div>
<div class="clearfix"></div>
<script>
    $(document).ready(function() {
        $(".togglee").click(function() {
            $(".middle-content").toggle(200);
        });
    });
</script>
<div class="content-mid">
    <div>
        <div class="middle-content" style="display: none;">
            <input class="form-control" value="{{$selectedTicket->first()->subject}}" disabled/>
            <form action="/adminpanel/ticket-edit/{{$selectedTicket->first()->id}}" method="post" name="list" autocomplete="off" style="margin-bottom:15px;"> @csrf
                <label>Yanıtlama Kutusu</label>
                <textarea name="reply" id="editor"> </textarea>
                <script>
                    editor.isReadOnly = false;
                    ClassicEditor.create(document.querySelector('#editor')).catch(error => {
                        console.error(error);
                    });
                    ClassicEditor.create(document.querySelector('#editor2')).catch(error => {
                        console.error(error);
                    });
                </script>
                <label> <strong>Ticket Durumu</strong> </label>
                <select class="form-control date" name="ticketStatus"> @foreach($ticketStatusData as $ticketStatus)
                        <option value="{{$ticketStatus}}" @if($activeTransactionStatus==$ticketStatus) selected @endif>{{$ticketStatus}}</option> @endforeach </select>
                <div style="height: 10px"></div>
                <input type="submit" value="YANITLA" class="btn btn-success testsend" name="list" style="width: 100%; font-weight: bolder;" /> </form>
            <!-- start content_slider -->
            </section>
            <!--Section: Live preview-->
        </div>
    </div> @foreach($subTicketList as $subTicket)
        <div class="ticketBox">
            <div class="col-md-12 ticketTitle"> <i class="fas fa-user fontsize26"></i> {{$subTicket->name}}
                <div class="float-right">{{date('d-m-Y H:i:s',strtotime($subTicket->inserted_at))}}</div>
            </div>
            <div class="col-md-12" style="color:black;"> {{strip_tags($subTicket->reply)}} </div>
        </div> @endforeach
    <div class="ticketBox">
        <div class="col-md-12 ticketTitle" > <i class="fas fa-user" style="font-size:26px;"></i> {{$selectedTicket->first()->name}}
            <div class="float-right">{{date('d-m-Y H:i:s',strtotime($subTicket->inserted_at))}}</div>
        </div>
        <div class="col-md-12" style="color:black;"> {{$selectedTicket->first()->question_description}} Tags
            <hr> </div>
    </div>
</div>
@include('adminpanel.footer');
</body>

</html>