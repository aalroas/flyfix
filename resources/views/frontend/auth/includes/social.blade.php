<x-utils.link
    :href="route('frontend.auth.social.login', 'bitbucket')"
    class="btn btn-bitbucket"
    icon="fa fa-bitbucket"
    :text="__('')"
    :hide="!config('services.bitbucket.active')" />

<x-utils.link
    :href="route('frontend.auth.social.login', 'facebook')"
    class="btn btn-facebook"
    icon="fa fa-facebook"
    :text="__('')"
    :hide="!config('services.facebook.active')" />

<x-utils.link
    :href="route('frontend.auth.social.login', 'google')"
    class="btn btn-google"
    icon="fa fa-google"
    :text="__('')"
    :hide="!config('services.google.active')" />

<x-utils.link
    :href="route('frontend.auth.social.login', 'github')"
    class="btn btn-github"
    icon="fa fa-github-alt"
    :text="__('')"
    :hide="!config('services.github.active')" />

<x-utils.link
    :href="route('frontend.auth.social.login', 'linkedin')"
    class="btn btn-linkedin"
    icon="fa fa-linkedin"
    :text="__('')"
    :hide="!config('services.linkedin.active')" />

<x-utils.link
    :href="route('frontend.auth.social.login', 'twitter')"
    class="btn btn-twitter white"
    icon="fa fa-twitter"
    :text="__('')"
    :hide="!config('services.twitter.active')" />
