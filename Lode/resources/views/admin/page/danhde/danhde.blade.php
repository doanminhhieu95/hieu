<table id="example2" class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>ID</th>
            <th>ID user</th>
            <th>Ngày đánh</th>
            <th>Number</th>
            <th>Tiền đánh</th>
            <th>Trúng</th>
            <th>Đài</th>
            <th>Kiểu chơi</th>
            <th>Cập nhật</th>
            <th>Hoàn tác</th>
        </tr>
    </thead>
    <tbody>
        @foreach($danhde as $dd)
        <tr>
            <td>{{$dd->id}}</td>
            <td>{{$dd->iduser}}</td>
            <td>{{$dd->ngaydanh}}</td>
            <td>{{$dd->number}}</td>
            <td>{{$dd->money}}</td>
            <td>{{$dd->jackpot}}</td>
            <td>{{$dd->city->name}}</td>
            <td>{{$dd->kieuchoi->name}}</td>
            <td>
                @if($dd->jackpot == -1)
                <form action="{{route('danhde.update',[$dd->id])}}" method="post">
                    {{csrf_field()}}
                    <input type="hidden" name="_method" value="put" />
                    <button type="submit" class="btn btn-default btn-xs">Cập nhật</button>
                    <input type="hidden" name="capnhat" value="1" />
                </form>
                @endif
            </td>
            <td>
                @if($dd->jackpot == -1)
                <form action="{{route('danhde.update',[$dd->id])}}" method="post">
                    {{csrf_field()}}
                    <input type="hidden" name="_method" value="put" />
                    <button type="submit" class="btn btn-danger btn-xs">Hoàn tác</button>
                    <input type="hidden" name="hoantac" value="1" />
                </form>
                @endif
            </td>
        </tr>
        @endforeach
    </tbody>
</table>