<form role="form" method="post" action="">
    <div class="box-body">
        <div class="col-md-6 default">
            <div class="form-group {{ $errors->first('b_name') ? 'has-error' : '' }} ">
                <label for="inputEmail3" class="control-label default">Name<sup class="title-sup"> (*)</sup></label>
                <div>
                    <input type="text" maxlength="100" class="form-control"  placeholder="Name" name="b_name" value="{{ old('b_name', isset($book) ? $book->b_name : '') }}">
                    <span class="text-danger "><p class="mg-t-5">{{ $errors->first('b_name') }}</p></span>
                </div>
            </div>
            @php
                $listAuthors = [];
            @endphp
            @if(isset($book->authorBook))
                @foreach($book->authorBook as $author)
                    @php array_push($listAuthors, $author->id) @endphp
                @endforeach
            @endif
            <div class="form-group {{ $errors->first('author') ? 'has-error' : '' }}" >
                <label for="inputEmail3" class="control-label default">Author<sup class="title-sup"> (*)</sup></label>
                <select name="author[]" class="form-control input_select2" data-type="status" style="width: 100%" multiple="multiple">
                    <option value="" >--Select Author --</option>
                    @if (isset($authors))
                        @foreach($authors as $author)
                            <option value="{{ $author->id }}"
                                @if( null !== old('author') and in_array($author->id, old('author')) or isset($listAuthors) and in_array($author->id, $listAuthors)) selected ="selected" @endif
                            >{{ $author->at_name }}</option>
                        @endforeach
                    @endif
                </select>
                <span class="text-danger "><p class="mg-t-5">{{ $errors->first('author') }}</p></span>
            </div>
            <div class="form-group {{ $errors->first('b_categories_id') ? 'has-error' : '' }}" >
                <label for="inputEmail3" class="control-label default">Category<sup class="title-sup"> (*)</sup></label>
                <select name="b_categories_id" class="form-control input_select2" data-type="status" style="width: 100%">
                    <option value="" >--Select Category --</option>
                    @if (isset($categories))
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ old('b_categories_id', isset($book->b_categories_id) ? $book->b_categories_id : '' ) == $category->id ? "selected='selected'" : "" }}>{{ $category->c_name }}</option>
                        @endforeach
                    @endif
                </select>
                <span class="text-danger "><p class="mg-t-5">{{ $errors->first('b_categories_id') }}</p></span>
            </div>
            <div class="form-group {{ $errors->first('b_publishing_company_id') ? 'has-error' : '' }}">
                <label for="inputEmail3" class="control-label default">Publishing Company<sup class="title-sup"> (*)</sup></label>
                <select name="b_publishing_company_id" class="form-control input_select2" data-type="status" style="width: 100%">
                    <option value="" >--Select Publishing Company --</option>
                    @if (isset($publishingCompany))
                        @foreach($publishingCompany as $company)
                            <option value="{{ $company->id }}" {{ old('b_publishing_company_id', isset($book->b_publishing_company_id) ? $book->b_publishing_company_id : '' ) == $company->id ? "selected='selected'" : "" }}>{{ $company->pc_name }}</option>
                        @endforeach
                    @endif
                </select>
                <span class="text-danger "><p class="mg-t-5">{{ $errors->first('b_publishing_company_id') }}</p></span>
            </div>

            <div class="form-group col-md-12 pd-l-default pd-r-default">
                <label for="inputEmail3" class="control-label">Status </label>
                <select name="b_status" class=" form-control" data-type="r_card_status" style="width: 100%">
                    <option value="1" {{ old('b_status', isset($book->b_status) ? $book->b_status : '') == 1 ? "selected='selected'" : "" }}>Active</option>
                    <option value="2" {{ old('b_status', isset($book->b_status) ? $book->b_status : '') == 2 ? "selected='selected'" : "" }}>Inactive</option>
                </select>
            </div>
            @if (!isset($book))
                <div class="form-group {{ $errors->first('ib_issue_number') ? 'has-error' : '' }} mg-t-15">
                    <label for="inputEmail3" class="control-label">Edition</label>
                    <div>
                        <input type="number" min="0" class="form-control"  placeholder="Edition" name="ib_issue_number" value="{{ old('ib_issue_number') }}">
                        <span class="text-danger "><p class="mg-t-5">{{ $errors->first('ib_issue_number') }}</p></span>
                    </div>
                </div>
            @endif
        </div>
        <div class="col-md-6">
            <div class="form-group col-md-12 {{ $errors->has('b_code_book') ? 'has-error' : '' }} pd-l-default pd-r-default">
                <label for="inputEmail3" class="control-label default col-sm-12">Code Book <sup class="title-sup"> (*)</sup></label>
                <div class="col-sm-8" style="display: inline-block; padding: 0px;">
                    <input class="form-control random_code" id="random_code" style="width: 320px;" oninput="if(value.length>10)value=value.slice(0,10)" name="b_code_book" value="{{ old('b_code_book', isset($book) ? $book->b_code_book : '') }}" type="text" placeholder="Code Book">
                </div>
                <div class="col-sm-4 default" style="display: inline-block;">
                    <button class="btn btn-blue btn-info btn-change btn-change-code" style="float: right;"><i class="fa fa-fw fa-refresh"></i>  Create code</button>
                </div>
                <div class="col-sm-12 default" style="display: inline-block;">
                    @if($errors->has('b_code_book'))
                        <span class="help-block">{{$errors->first('b_code_book')}}</span>
                    @endif
                </div>
            </div>

            <div class="form-group {{ $errors->first('b_description') ? 'has-error' : '' }}">
                <label for="inputEmail3" class="control-label default">Description <sup class="title-sup"> (*)</sup></label>
                <div>
                    <textarea name="b_description" id="b_description" cols="60" rows="5" style="height: 100px;">{{ old('b_description', isset($book) ? $book->b_description : '') }}</textarea>
                    <span class="text-danger "><p class="mg-t-5">{{ $errors->first('b_description') }}</p></span>
                </div>
            </div>
            <div class="form-group {{ $errors->first('b_price') ? 'has-error' : '' }}">
                <label for="inputEmail3" class="control-label default">Price</label>
                <div>
                    <input type="number" min="0" class="form-control"  placeholder="Price" name="b_price" value="{{ old('b_price', isset($book) ? $book->b_price : '') }}">
                    <span class="text-danger "><p class="mg-t-5">{{ $errors->first('b_price') }}</p></span>
                </div>
            </div>
            <div class="form-group {{ $errors->first('b_amount_liquidated') ? 'has-error' : '' }}">
                <label for="inputEmail3" class="control-label default">Amount Liquidated</label>
                <div>
                    <input type="number" min="0" class="form-control"  placeholder="Amount Liquidated" name="b_amount_liquidated" value="{{ old('b_amount_liquidated', isset($book) ? $book->b_amount_liquidated : '') }}">
                    <span class="text-danger "><p class="mg-t-5">{{ $errors->first('b_amount_liquidated') }}</p></span>
                </div>
            </div>
            @if (!isset($book))
            <div class="form-group {{ $errors->first('ib_amount') ? 'has-error' : '' }}">
                <label for="inputEmail3" class="control-label">Amount</label>
                <div>
                    <input type="number" min="0" class="form-control"  placeholder="Amount" name="ib_amount" value="{{ old('ib_amount') }}">
                    <span class="text-danger "><p class="mg-t-5">{{ $errors->first('ib_amount') }}</p></span>
                </div>
            </div>
            @endif
        </div>
    </div>
    <!-- /.box-body -->
    <div class="box-footer">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <button type="submit" class="btn btn-primary"><i class="fa fa-floppy-o"></i> Save data</button>
        <a href="{{ route('get.list.book') }}" class="btn btn-danger"><i class="fa fa-close"></i> Cancel</a>
    </div>
</form>