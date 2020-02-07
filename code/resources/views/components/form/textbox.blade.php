{{--
    
    Usage example:

    @include('components.form.textbox', [
                'field' => 'email', 
                'fieldValue' => '', 
                'required' => true, 
                'class' => 'class', 
                'autofocus' => '',
                'type' = '', 'id' =>''])
--}}


<input class="form-control @error($field) is-invalid @enderror @isset($class) {{ $class }} @endisset" 
        @isset($type)
            type = "{{ $type }}"
        @else
            type="text" 
        @endisset

        @isset($id)
            id = "{{ $id }}"
        @endisset

        name="{{ $field }}" 

        value = "{{ $fieldValue ?? '' }}"

        @isset($required)
        	required 
        @endisset
        
        @isset($autofocus)
        	autofocus
        @endisset />

@include('components.form.error', ['field' => $field])