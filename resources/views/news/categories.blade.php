@extends('layouts.public')
@section('content')
    <h1>Выберите категорию новостей</h1>
    <?php foreach ($categories as $cat): ?>
    <a class="btn btn-sm btn-success"
       href="/news/category/<?= $cat->id ?>">
        <?= $cat->category ?>
    </a>
    <?php endforeach; ?>
@stop
