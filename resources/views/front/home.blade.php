@push('custom-css')
    <style>
        /* Additional custom CSS */
        .card_wrapper{
          display: flex;
          flex-wrap: wrap;
          justify-content:center;
          gap: 20px;
          margin: 20px 10px;
        }
        .product-card {
            /* background-color: #ca5151; */
            -webkit-box-shadow: 2px 4px 10px 1px rgba(0, 0, 0, 0.47);
            box-shadow: 2px 4px 10px 1px rgba(201, 201, 201, 0.47);
            max-width: 300px;
            width: 1000px;
            display: flex;
            flex-direction: column;
            height: 360px;
            border-radius: 10px;
            overflow: hidden;
        }

        .img-container {
            flex: 1;
        }

        img {
            width: 100%;
            object-fit: cover;
            height: 250px;
        }

        .info-container {
            display: flex;
            align-items: center;
            flex-direction: column;
            flex: 1;
            padding: 20px;

        }
    </style>
@endpush
<x-layout>
  <div class="card_wrapper">
    @foreach($projects as $item)
      <div class="product-card">
        <a href="{{route('note',$item->id)}}">

            <div class="img-container">
                <img src="{{asset('images/home.png')}}" alt="no img" />
            </div>
        </a>
          <div class="info-container">
              <span class="item-title">{{$item->name}}</span>
              <span class="item-price">
                  <p>content</p>
              </span>
          </div>
      </div>
    @endforeach
  </div>
</x-layout>
