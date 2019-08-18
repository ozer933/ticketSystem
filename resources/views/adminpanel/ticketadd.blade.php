 @include('adminpanel.adminpanelmaster')

<div class="content-mid">
    <div class="jumbotron">
        <div class="middle-content">

                <form action="/adminpanel/ticket-add" method="post" autocomplete="off">
                    @csrf

                <label>
                    <strong>Konu giriniz</strong>
                </label>
                <input class="form-control"  name="subject" type="text" placeholder="Konu giriniz" required/>
                <label>
                    <strong>Aciliyet durumu</strong>
                </label>
                <select class="form-control date" name="emergencyStatus"> @foreach($emergencyStatusData as $emergency)

                        <option value="{{$emergency}}">{{$emergency}}</option> @endforeach
                </select>
                <label>
                    <strong>Açıklama giriniz</strong>
                </label>
                <textarea name="content" class="form-control textareaa" placeholder="Açıklama giriniz" id="exampleFormControlTextarea1"></textarea>
                <label>
                    <strong>Tag giriniz</strong>
                </label>
                <input class="form-control " name="tags"  type="text" placeholder="Aralarına virgül koyarak tagları giriniz. Örn: Php,Laravel,MYSQL,MSSQL " required/>



                <input type="submit" value="TİCKET DÜZENLE" class="btn btn-success " name="list" style="width: 100%; font-weight: bolder;" />
            </form>
            <!-- start content_slider -->
            </section>
            <!--Section: Live preview-->
        </div>
    </div>
</div>
 @include('adminpanel.footer');
</body>
</html>