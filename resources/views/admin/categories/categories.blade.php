@extends('layouts.admin')
@section('title') Категории! @parent  @stop
@section('headcontent') - Категории@parent  @stop

@section('content')
    @include('components.admin.session')
    <div class="input-group" style="margin-bottom: 10px; width: 500px;">
        <input type="text" id="newcategory" class="form-control" placeholder="Новая категория">
        <div class="input-group-append pointer">
            <button class="btn  btn-primary" onclick="addCategory()" ype="button">Добавить категорию</button>
        </div>
    </div>
    @csrf
    <div id="list-categories">
        @foreach ($categories as $cat)
            <div class="categories" id="{{$cat->id}}">
                <div>
                    {{$cat->category}}
                </div>

                <a class="btn btn-sm btn-success"
                   href="#" style="margin-bottom: 10px;">
                    Редактировать
                </a>
                <a class="btn btn-sm btn-danger"
                   onclick="delCategory( {{$cat->id}})" style="margin-bottom: 10px;">
                    Удалить
                </a>
            </div>
        @endforeach
    </div>
@stop

<style>
    .categories {
        display: grid;
        grid-template-columns: 150px 150px 120px;
        grid-gap: 20px;
    }
</style>
<script>


    let delCategory = (categoryId) => {
        if (confirm('Вы точно хотите удалить категорию!')) {
            let data = new FormData();
            data.append('id', categoryId);
            data.append('_method', 'DELETE');
            data.append('_token', document.getElementsByName('_token')[0].value);
            fetch(`/admin/categories/${categoryId}`, {
                method: 'POST',
                body: data
            })
                .then(res => res.json())
                .then(res => {
                    if (res.err == 0) {
                        document.getElementById(categoryId).remove();
                    }
                })
                .catch(e => alert(e.message));
        }
    }

    let addCategory = () => {
        let categoryName = document.getElementById('newcategory').value;
        if (categoryName == '') {
            alert('Введите название новйо категории');
            return false;
        }
        let data = new FormData();
        data.append('category', categoryName);
        data.append('_token', document.getElementsByName('_token')[0].value);
        fetch(`/admin/categories`, {
            method: 'POST',
            body: data
        })
            .then(res => res.json())
            .then(res => {
                if (res.err == 0) {
                    document.getElementById('newcategory').value = '';
                    addLineCategory(res.data)
                } else {
                    alert(res.msg)
                }
            })
        //  .catch(e => alert('Ошибка'));
    }

    let addLineCategory = (data) => {
        const listCategories = document.getElementById('list-categories');
        listCategories.insertAdjacentHTML('afterbegin', `
        <div class="categories" id="${data.id}">
                <div>
                    ${data.category}
                </div>

        <a class="btn btn-sm btn-success"
           href="#" style="margin-bottom: 10px;">
            Редактировать
        </a>
        <a class="btn btn-sm btn-danger"
           onclick="delCategory( ${data.id})" style="margin-bottom: 10px;">
                    Удалить
                </a>
            </div>
        `)

    }

</script>
