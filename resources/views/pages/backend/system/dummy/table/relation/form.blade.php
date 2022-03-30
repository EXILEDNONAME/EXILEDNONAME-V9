<div class="form-group row">
  <label class="col-lg-3 col-form-label"> <a href="/dashboard/dummy/tables/generals/create" target="_blank" class="text-danger font-weight-bold"><u> ID General </u></a></label>
  <div class="col-lg-9">
    {!! Form::select('id_general', dummy_table_generals (), (isset($data->id_general) ? $data->id_general : NULL), ['placeholder' => '- Select Table General -', 'class' => 'form-control', 'required' => 'required']) !!}
    @error('id_general') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span> @enderror
  </div>
</div>

<div class="form-group row">
  <label class="col-lg-3 col-form-label"> Description </label>
  <div class="col-lg-9">
    {!! Form::textarea('description', (isset($data->description) ? $data->description : ''), ['class' => $errors->has('description') ? 'summernote form-control is-invalid' : 'summernote form-control', 'contentEditable' => 'true']) !!}
    @error('description') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span> @enderror
  </div>
</div>

<!-- <div class="summernote" id="kt_summernote_1" name="description"></div> -->
<!-- <textarea class=" form-control" id="kt_summernote_1" name="description"></textarea> -->
