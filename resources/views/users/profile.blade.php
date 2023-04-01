@extends('layouts.login')

@section('content')

<!-- エラーメッセージの表示 -->
@if ($errors->any())
  <div class="">
    <ul>
      @foreach ($errors->all() as $error)
      <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
  <br><br><!-- 後で<br>の代わりにCSSでmarginかpaddingつける -->
@endif
<!-- $errors->any()は、変数$errorsの中にエラーメッセージがあるかどうかチェックを行うメソッドです。エラーメッセージがあればtrue、なければfalseを戻します。 -->
<!-- $errors->all()にはバリデーションの中のチェックで発生したエラー情報が配列として保持しています。foreachを使用することで1つ1つのメッセージを取り出すことができます。 -->

    {!! Form::open(['route' => ['profileUpdate'], 'method' => 'POST', "enctype" => "multipart/form-data" ]) !!}
    {{Form::token()}}
    @csrf


<table>
  <tbody>
    <tr>
      <td class="icon-wrapper"><img src="storage/{{ Auth::user()->images }}" alt="my-icon" class="icon-space"></td>
      <td>user name</td>
      <td>{{ Form::text('name', Auth::user()->username, ['class' => 'update']) }}</td>
    </tr>
    <tr>
      <td></td>
      <td>mail address</td>
      <td>{{ Form::text('mail', Auth::user()->mail,['class' => 'update']) }}</td>
    </tr>
    <tr>
      <td></td>
      <td>password</td>
      <td>{{ Form::password('newpassword',['class' => 'update']) }}</td>
    </tr>
    <tr>
      <td></td>
      <td>password confirm</td>
      <td>{{ Form::password('newpassword_confirmation',['class' => 'update']) }}</td>
    </tr>
    <tr>
      <td></td>
      <td>bio</td>
      <td>{{ Form::text('bio', Auth::user()->bio, ['class' => 'update']) }}</td>
    </tr>
    <tr>
      <td></td>
      <td>icon image</td>
      <!-- <label for="file-upload"><td>{{ Form::file('new_image',null, ['class' => 'update-image', 'id' => 'file-upload']) }}</td></label> -->
      <td class="icon-form">
          <label for="file-upload" class="file-space">
              <input type="file" name="new_image" class="update-image" id="file-upload" accept=".jpg, .png, .bmp, .gif, .svg">
          </label>
      </td>
    </tr>
  </tbody>
</table>
<!-- bootstrapでcss整える↓ -->
<!-- <input type="button" class="button" value="更新"> -->
{{Form::submit('更新',['class'=>'btn'])}}
{!! Form::close() !!}


@endsection
