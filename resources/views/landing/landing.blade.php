
@extends('layouts.landing')
@section('content')

  
      {" "}
      
  let [loading, setLoading] = useState(true);
  useEffect(() => {
    setTimeout(() => {
      setLoading(false, 1000);
    Aos.init({
      once: true,
      duration: 1000,
      disable: function () {
        var maxWidth = 991;
        return window.innerWidth < maxWidth;
      },
    }, []);

  
      {loading && (
        <div class="preloader-wrapper">
          <div class="lds-ellipsis">
            <div></div>
            <div></div>
            <div></div>
            <div></div>
          </div>
        </div>
      <div className={`page-wrapper overflow-hidden`}>{children}</div>
    



    



@endsection
