@extends('layouts.public')
@section('content')
    <h1>Выберите категорию новостей</h1>
    <?php foreach ($categories as $id=>$cat): ?>
    <a class="btn btn-sm btn-success"
       href="/news/category/<?= $id ?>">
        <?= $cat ?>
    </a>
    <?php endforeach; ?>
@stop
