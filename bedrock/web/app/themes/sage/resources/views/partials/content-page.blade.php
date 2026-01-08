<div class="animate-on-scroll animate-fade-in">
  @php(the_content())

  @if ($pagination())
    <nav class="page-nav" aria-label="Page">
      {!! $pagination !!}
    </nav>
  @endif
</div>
