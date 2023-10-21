<div class="card-body">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th><center>Judul</center></th>
                <th><center>Isi Event</center></th>
                <th><center>Tanggal Event</center></th>
                <th><center>Gambar</center></th>
                <th><center>Aksi</center></th>
            </tr>
        </thead>
       
        <tbody>
            @foreach ($dteventdesa as $item)
            <tr>
                <td width="20%">{{$item->judul}}</td>
                <td width="30%" align="justify">{{$item->isi}}</td>
                <td width="10%">{{date('d-m-y', strtotime($item->tglevent))}}</td>
                <td width="20%" align="center"><img src="{{ asset('fotoevent')}}/{{$item->gambar}}" height="50%" width="50%"></td>
                <td width="20%" style="vertical-align:middle" align="center">
                    <button type="button" class="btn btn-warning">Edit</button>
                    <button type="button" class="btn btn-danger">Hapus</button>
                </td>
            </tr>  
        </tbody>
        
        @endforeach
        
    </table>
</div>