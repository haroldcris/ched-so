{{--
    
    Usage example:

    @include('components.form.combobox', [
                'field' => 'schoolcode',
                'collection' =>  'schools'
                'collectionItemFieldValue' = ''
                'collectionItemDisplayValue' = ''
                'selectedValue' => ''                              
                'required' => true, 
                'autofocus' => '',
                'class' => 'class' ])
--}}

<select name="{{ $field }}"  id="{{ $field }}" 
	class="form-control @error($field) is-invalid @enderror  @isset($class) {{ $class }} @endisset "

 	@isset($required)
    	required 
    @endisset
    
    @isset($autofocus)
    	autofocus
    @endisset  />

    
    <option value ="" >Choose...</option>

    @foreach($collection as $item)
    
    <option @if( $selectedValue == $item->$collectionItemFieldValue ) selected @endif 
		 value ="{{ $item->$collectionItemFieldValue }}" > {{ $item->$collectionItemDisplayValue }} </option>
   
    @endforeach
</select>                                
@include('components.form.error', ['field' => $field])