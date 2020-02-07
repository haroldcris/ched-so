{{--
    HTML to display a help message on a form field.
    Usage example:

    @include('components.form.error', ['field' => 'name'])    
    
--}}
@error($field)
 <div class="invalid-feedback" >{{ $message }}</div>
@enderror