<a  class="flex gap-2 items-center text-xl font-medium dark:text-white app-logo">
    <img src="{{ global_setting()->logoUrl }}" class="h-8" alt="{{global_setting()->name}} Logo" /> 
    @if (global_setting()->show_logo_text)
    <span><span style="color:#C8F135;">Tuf</span><span style="color:#0D0D0D;" class="dark:text-white"> Table</span></span>
    @endif
</a>
