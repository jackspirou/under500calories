@extends('layouts/master', ['title' => 'Under 500 Calories'])

@section('js')
@stop

@section('css')
@stop

@section('content')
<div class="container text-left">
@foreach ($recipes as $recipe)

    <span><strong>title: {{ $recipe->name }}</strong></span><br/>
    <span>id: {{ $recipe->id }}</span><br/>
    <span>pic: {{ $recipe->pic }}</span><br/>
    <span>link: {{ $recipe->link }}</span><br/>
    <span>bitly: {{ $recipe->bitly }}</span><br/>
    <span>vendor: {{ $recipe->vendor }}</span><br/>
    <span>vendor_link: {{ $recipe->vendor_link }}</span><br/>
    <span>author: {{ $recipe->author }}</span><br/>
    <span>yums: {{ $recipe->yums }}</span><br/>
    <span>calories: {{ $recipe->calories }}</span><br/>
    <span>servings: {{ $recipe->servings }}</span><br/>
    <span>total_fat: {{ $recipe->total_fat }}</span><br/>
    <span>calories_from_fat: {{ $recipe->calories_from_fat }}</span><br/>
    <span>saturated_fat: {{ $recipe->saturated_fat }}</span><br/>
    <span>trans_fat: {{ $recipe->trans_fat }}</span><br/>
    <span>cholesterol: {{ $recipe->cholesterol }}</span><br/>
    <span>sodium: {{ $recipe->sodium }}</span><br/>
    <span>potassium: {{ $recipe->potassium }}</span><br/>
    <span>carbohydrates: {{ $recipe->carbohydrates }}</span><br/>
    <span>fiber: {{ $recipe->fiber }}</span><br/>
    <span>sugars: {{ $recipe->sugars }}</span><br/>
    <span>protein: {{ $recipe->protein }}</span><br/>
    <span>vitamin_a: {{ $recipe->vitamin_a }}</span><br/>
    <span>vitamin_c: {{ $recipe->vitamin_c }}</span><br/>
    <span>iron: {{ $recipe->iron }}</span><br/>
    <span>calcium: {{ $recipe->calcium }}</span><br/>
    <span>status: {{ $recipe->status }}</span><br/>
    <span>created_at: {{ $recipe->created_at }}</span><br/>
    <span>updated_at: {{ $recipe->updated_at }}</span><br/>

    <br />
    <br />

@endforeach
</div>
@stop
