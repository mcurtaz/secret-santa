<script id="handlebars-template" type="text/x-handlebars-template">
    <div class="col-md-4 col-lg-3 py-2">
        <div class="card shadow border-dark rounded">
            <div class="card-header">
            {{name}}
            </div>
            <div class="card-body clearfix">
                <h6> 
                    {{price}} Euro
                </h6>
                <p class="card-text pr-1">
                        {{description}}
                </p>
                    <a href="{{link}}" class="float-right rounded btn btn-secondary {{disabled}}">Link</a>
            </div>
            {{{footer}}}
        </div>
    </div>
</script>
