@extends('layouts.login')

@section('content')

<!-- エラーメッセージの表示 -->
@if ($errors->any())
  <div class="error-text">
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

<table id="profile">
  <tbody>
    <tr>
      <td class="icon-wrapper"><p><img src="storage/{{ Auth::user()->images }}" alt="my-icon" class="icon-space"></p></td>
      <td>user name</td>
      <td class="p-content">{{ Form::text('name', Auth::user()->username, ['class' => 'update']) }}</td>
    </tr>
    <tr>
      <td></td>
      <td>mail address</td>
      <td class="p-content">{{ Form::text('mail', Auth::user()->mail,['class' => 'update']) }}</td>
    </tr>
    <tr>
      <td></td>
      <td>password</td>
      <td class="p-content">{{ Form::password('newpassword',['class' => 'update']) }}</td>
    </tr>
    <tr>
      <td></td>
      <td>password confirm</td>
      <td class="p-content">{{ Form::password('newpassword_confirmation',['class' => 'update']) }}</td>
    </tr>
    <tr>
      <td></td>
      <td>bio</td>
      <td class="p-content">{{ Form::text('bio', Auth::user()->bio, ['class' => 'update']) }}</td>
    </tr>
    <tr>
      <td></td>
      <td>icon image</td>
      <td class="icon-form">
          <label for="file-upload" class="file-space">
              <input type="file" name="new_image" class="update-image" id="file-upload" accept=".jpg, .png, .bmp, .gif, .svg">
          </label>
      </td>
    </tr>
  </tbody>
</table>

<div id="update-btn">
{{Form::submit('更新',['class'=>'btn btn-danger update-btn'])}}
</div>

{!! Form::close() !!}


@endsection
