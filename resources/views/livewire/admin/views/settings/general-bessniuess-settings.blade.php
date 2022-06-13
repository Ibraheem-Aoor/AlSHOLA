<div>
    <div class="content">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <strong>General Site Settings</strong><small></small>
                        </div>
                        <div class="card-body">
                            <div class="custom-tab">
                                <nav>
                                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                        <a class="nav-item nav-link" id="custom-nav-home-tab" data-toggle="tab"
                                            href="#custom-nav-home" role="tab" aria-controls="custom-nav-home"
                                            aria-selected="false">Social Links</a>
                                        <a class="nav-item nav-link" id="custom-nav-home-seo" data-toggle="tab"
                                            href="#custom-nav-seo" role="tab" aria-controls="custom-nav-home"
                                            aria-selected="false">SEO</a>
                                    </div>
                                </nav>
                                <div class="tab-content pl-3 pt-2" id="nav-tabContent" wire:ignore>
                                    <div class="tab-pane fade" id="custom-nav-home" role="tabpanel">
                                        <div class="container">
                                            <form wire:submit="saveSocialLinks()">
                                                <div class="row">

                                                    <div class="col-sm-6">
                                                        <label for="inputEmail3"
                                                            class="">Facebook:</label>
                                                        <input type="text"
                                                            value="{{ Cache::get('businessSetting')->where('key', 'facebook')->first()->value }}"
                                                            class="form-control" id="inputEmail3"
                                                            wire:model.lazy="fb">
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <label for="inputEmail3"
                                                            class="">Instagram:</label>
                                                        <input type="text"
                                                            value="{{ Cache::get('businessSetting')->where('key', 'instagram')->first()->value }}"
                                                            class="form-control" id="inputEmail3"
                                                            wire:model.lazy="insta">
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <label for="inputEmail3"
                                                            class="">LinkedIn:</label>
                                                        <input type="text"
                                                            value="{{ Cache::get('businessSetting')->where('key', 'linkedin')->first()->value }}"
                                                            class="form-control" id="inputEmail3"
                                                            wire:model.lazy="linkedin">
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <label for="inputPassword3"
                                                            class="col-form-label">Twitter:</label>
                                                        <input type="text"
                                                            value="{{ Cache::get('businessSetting')->where('key', 'twitter')->first()->value }}"
                                                            class="form-control" id="inputPassword3"
                                                            wire:model.lazy="twitter">
                                                    </div>
                                                    <div class="col-sm-12">
                                                        <button type="submit"
                                                            class="btn btn-outline-primary">SAVE</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>

                                    {{-- Other Temrs --}}

                                    <div class="tab-pane fade" id="custom-nav-seo" role="tabpanel"
                                        aria-labelledby="custom-nav-contact-tab">
                                        <div class="contianer">
                                            <form wire:submit="saveSeo()">
                                                <div class="row">
                                                    <div class="col-sm-12 text-danger">
                                                        Tip 1: OG SEO Tags is used to optimize your webistes when sharing it on social media platforms.
                                                    </div>
                                                    <div class="col-sm-12 text-danger mb-2">
                                                        Tip 2: Meta Tags is used to optimize your webistes on Search Engines.
                                                    </div>
                                                    <div class="col-sm-6 mb-2">
                                                        <label for="">OG:Title</label>
                                                        <input type="text" class="form-control"
                                                            wire:model.lazy="og_title">
                                                    </div>

                                                    <div class="col-sm-6 mb-2">
                                                        <label for="">OG:Type</label>

                                                        <input type="text" class="form-control"
                                                            wire:model.lazy="og_type">
                                                    </div>

                                                    <div class="col-sm-6 mb-2">
                                                        <label for="">OG:Descreption</label>

                                                        <input type="text" class="form-control"
                                                            wire:model.lazy="og_descreption">
                                                    </div>


                                                    <div class="col-sm-12 ">
                                                        <div class="form-group">
                                                            <label for="">Meta descreption</label>
                                                            <textarea name="" id="" cols="30" rows="10" class="form-control" wire:model.lazy="description"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12 ">
                                                        <div class="form-group">
                                                            <label for="">Meta keywords</label>
                                                            <textarea name="" id="" cols="30" rows="10" class="form-control" wire:model.lazy="keywords"></textarea>
                                                        </div>
                                                    </div>
                                                    <button type="submit"
                                                        class="btn btn-outline-primary col-sm-12">SAVE</button>
                                                </div>
                                            </form>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @push('js')
                        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
                                                integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
                                                crossorigin="anonymous"></script>
                        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
                        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"
                                                integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF"
                                                crossorigin="anonymous"></script>

                        <script>
                            $('#exampleModal_5').on('show.bs.modal', function(event) {
                                var button = $(event.relatedTarget)
                                var message = button.data('message')
                                // var description = button.data('description')
                                var modal = $(this)
                                modal.find('.modal-body #message').val(message);
                            });
                            $('#descmodal').on('show.bs.modal', function(event) {
                                var button = $(event.relatedTarget)
                                var desc = button.data('desc')
                                // var description = button.data('description')
                                var modal = $(this)
                                modal.find('.modal-body #desc').val(desc);
                            });
                        </script>
                    @endpush
                </div>
            </div>
        </div>
    </div>
</div>
