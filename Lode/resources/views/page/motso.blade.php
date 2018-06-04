
<div style="position:relative;min-height:100px">
    <div id="loto_type_info" data-code="dauduoi_dau">
        <script type="text/javascript">
            (function ($) {
                $(document).ready(function () {
                    //Currency format
                    $('.format_currency').formatCurrency({
                        roundToDecimalPlace: 0,
                        symbol: ''
                    });

                    $('.format_currency').keyup(function () {
                        $(this).formatCurrency({
                            roundToDecimalPlace: 0,
                            symbol: ''
                        });
                    });
                });
            })(jQuery);
        </script>
        <div id="tabBetTypeDetail" style="margin-top: 20px;">
            <table style="width: 100%; height: 100%;">
                <tbody>
                    <tr>
                        <td style="padding-left: 15px;">
                            <table cellpadding="5px">
                                <tbody>
                                    <tr>
                                        <td>
                                            <span class="tabactived">0-9</span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="10">
                            <table style="width: 100%;height:100%">
                                <tbody>
                                    <tr>
                                        <td>
                                            <span class="so">
                                                <span class="so-item">0</span>
                                            </span>
                                        </td>
                                        <td>
                                            <span class="so">
                                                <span class="so-item">1</span>
                                            </span>
                                        </td>
                                        <td>
                                            <span class="so">
                                                <span class="so-item">2</span>
                                            </span>
                                        </td>
                                        <td>
                                            <span class="so">
                                                <span class="so-item">3</span>
                                            </span>
                                        </td>
                                        <td>
                                            <span class="so">
                                                <span class="so-item">4</span>
                                            </span>
                                        </td>
                                        <td>
                                            <span class="so">
                                                <span class="so-item">5</span>
                                            </span>
                                        </td>
                                        <td>
                                            <span class="so">
                                                <span class="so-item">6</span>
                                            </span>
                                        </td>
                                        <td>
                                            <span class="so">
                                                <span class="so-item">7</span>
                                            </span>
                                        </td>
                                        <td>
                                            <span class="so">
                                                <span class="so-item">8</span>
                                            </span>
                                        </td>
                                        <td>
                                            <span class="so">
                                                <span class="so-item">9</span>
                                            </span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div id="loto_type_info_load" class="form_load"></div>
</div>
<div id="bet_type_load" class="form_load" style="display: none;">
    <div id="loader"></div>
</div>