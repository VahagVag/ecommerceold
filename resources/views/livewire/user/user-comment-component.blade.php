<div>
    <div class="container" style="padding: 30px 0;">
        <div class="row">
            <div class="col-md-12">
                <div id="review_form_wrapper">
                    <div id="comments">
                        <h2 class="woocommerce-Reviews-title">Write Comment</h2>
                        <ol class="commentlist">
                            <li class="comment byuser comment-author-admin bypostauthor even thread-even depth-1" id="li-comment-20">
                                <div id="comment-20" class="comment_container">
                                    <img alt="" src="{{ asset('assets/images/products') }}/{{$orderItem->product->image}}" height="80" width=80">
                                    <div class="comment-text">
                                        <p class="meta">
                                            <h5>For</h5>
                                        </p>
                                        <p class="meta">
                                            <strong class="woocommerce-review__author">{{$orderItem->product->name}}</strong>
                                        </p>
                                    </div>
                                </div>
                            </li>
                        </ol>
                    </div><!-- #comments -->
                    <div id="review_form">
                        @if(Session::has('message'))
                            <p class="alert alert-success" role="alert">{{Session::get('message')}}</p>
                        @endif
                        <div id="respond" class="comment-respond">
                            <form wire:submit.prevent="addComment" id="commentform" class="comment-form">
                                <p class="comment-form-comment">
                                    <label for="comment">Your Comment<span class="required">*</span>
                                    </label>
                                    <textarea id="comment" name="comment" cols="45" rows="8" wire:model="comment"></textarea>
                                    @error('comment') <span class="text-danger">{{$message}}</span> @enderror
                                </p>
                                <p class="form-submit">
                                    <input name="submit" type="submit" id="submit" class="submit" value="Submit">
                                </p>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

</div>
