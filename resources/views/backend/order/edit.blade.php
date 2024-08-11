@extends('backend.layouts.master')
@section('order-active', 'active')

@section('title', 'Edit Order')

@section('main-content')
    <div class="card">
        <h5 class="card-header">Edit Order</h5>
        <div class="card-body">
            <form method="post" action="{{ route('order.update', $order->id) }}">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="userId" class="col-form-label">User <span class="text-danger">*</span></label>
                    <select id="userId" name="user_id" class="form-control">
                        <option value="">--Select User--</option>
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}" {{ $order->user_id == $user->id ? 'selected' : '' }}>
                                {{ $user->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('user_id')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div id="products-container">
                    <h5>Ordered Products</h5>
                    <div class="table-responsive">
                        <table class="table table-borderless">
                            <thead>
                                <tr>
                                    <th style="width: 30%">Product</th>
                                    <th style="">Qty</th>
                                    <th style="">Adjusted Price</th>
                                    <th style="">Sub Total</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($order->orderedProducts as $index => $orderedProduct)
                                    <tr class="product-row">
                                        <td>
                                            <select name="product_id[]"
                                                class="form-control product-select productSelectGroup">
                                                <option value="">--Select Product--</option>
                                                @foreach ($products as $product)
                                                    <option value="{{ $product->id }}"
                                                        {{ $orderedProduct->product_id == $product->id ? 'selected' : '' }}
                                                        data-price="{{ $product->price }}">
                                                        {{ $product->title }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('product_id.' . $index)
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </td>
                                        <td>
                                            <input type="number" name="qty[]" class="form-control qty-input"
                                                placeholder="Enter quantity" value="{{ $orderedProduct->qty }}">
                                            @error('qty.' . $index)
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </td>
                                        <td>
                                            <input type="number" name="adjusted_price[]" class="form-control price-input"
                                                placeholder="Enter adjusted price" value="{{ $orderedProduct->price }}">
                                            @error('adjusted_price.' . $index)
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </td>
                                        <td>
                                            <input type="number" name="subtotal[]" class="form-control subtotal-input"
                                                readonly value="{{ $orderedProduct->qty * $orderedProduct->price }}">
                                        </td>
                                        <td class="text-center">
                                            <button type="button" class="btn btn-success btn-add-product">+</button>
                                            <button type="button" class="btn btn-danger btn-remove-product">-</button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="form-group">
                    <label for="totalPriceText" class="col-form-label">Total Price</label>
                    <div class="input-group">
                        <input id="totalPriceText" type="text" class="form-control" name="total_amount" readonly
                            value="{{ $order->total_amount }}">
                        @error('total_amount')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="form-group mt-3">
                    <button type="submit" class="btn btn-success">Update</button>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        function formatCurrency(amount) {
            return new Intl.NumberFormat('id-ID', {
                style: 'currency',
                currency: 'IDR',
            }).format(amount);
        }

        function updateSubtotal(row) {
            var qty = row.find('.qty-input').val();
            var price = row.find('.price-input').val();
            var subtotal = qty * price;
            row.find('.subtotal-input').val(subtotal);
            updateTotalAmount();
        }

        function updateTotalAmount() {
            var total = 0;
            $('.subtotal-input').each(function() {
                var subtotal = $(this).val();
                if (subtotal) {
                    total += parseFloat(subtotal);
                }
            });
            $('#totalAmount').val(total);
            $('#totalPriceText').val(formatCurrency(total)); // Update total price field with formatted value
        }

        $(document).ready(function() {
            $('.productSelectGroup').select2({
                placeholder: '--Select Product--',
                allowClear: true
            });
            $('#userId').select2({
                placeholder: '--Select User--',
                allowClear: true
            });

            $(document).on('change', '.product-select', function() {
                var row = $(this).closest('.product-row');
                var price = $(this).find('option:selected').data('price');
                row.find('.price-input').val(price);
                updateSubtotal(row);
            });

            $(document).on('input', '.qty-input, .price-input', function() {
                var row = $(this).closest('.product-row');
                updateSubtotal(row);
            });

            $(document).on('click', '.btn-add-product', function() {
                var productRow = $('.product-row:first').clone();
                productRow.find('input').val('');
                productRow.find('select').val('');
                productRow.find('select').next().remove();

                $('#products-container tbody').append(productRow);

                $('.productSelectGroup').select2({
                    placeholder: '--Select User--',
                    allowClear: true
                });
                $('.productSelectGroup').select2({
                    placeholder: '--Select User--',
                    allowClear: true
                });
            });

            $(document).on('click', '.btn-remove-product', function() {
                if ($('.product-row').length > 1) {
                    $(this).closest('.product-row').remove();
                    updateTotalAmount();
                }
            });
        });
    </script>
@endpush
