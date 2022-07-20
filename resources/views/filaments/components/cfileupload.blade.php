@php
    $datalistOptions = $getDatalistOptions();

    $affixLabelClasses = [
        'whitespace-nowrap group-focus-within:text-primary-500',
        'text-gray-400' => ! $errors->has($getStatePath()),
        'text-danger-400' => $errors->has($getStatePath()),
    ];
@endphp

<x-dynamic-component
    :component="$getFieldWrapperView()"
    :id="$getId()"
    :label="$getLabel()"
    :label-sr-only="$isLabelHidden()"
    :helper-text="$getHelperText()"
    :hint="$getHint()"
    :hint-icon="$getHintIcon()"
    :required="$isRequired()"
    :state-path="$getStatePath()"
>
    <div class="control">
        <div class="file is-primary">
            <label class="file-label">
                <input class="file-input" id="{{ $getId() }}" type="file" name="resume">
                <span class="file-cta">
                          <span class="file-icon">
                              <i data-feather="upload"></i>
                          </span>
                          <span class="file-label">
                              Choose a file…
                          </span>
                      </span>
            </label>
        </div>
    </div>


    </div>


</x-dynamic-component>
