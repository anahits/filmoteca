<div class="calendar">
    <div class="header-programming">
        <h2 class="text-center">@lang('exhibitions.frontend.calendar.title')</h2>
        <h5 class="text-center">@lang('exhibitions.frontend.calendar.subtitle')</h5>
    </div>
    <table class="text-center">
    <caption>@lang('dates.months.' . $calendar->getToday()->format('F') )
                <?php
                    echo date("Y");
                ?></caption>
        <tr>
            <th>
                @lang('dates.week-days-abbreviations.Su')
            </th>
            <th>
                @lang('dates.week-days-abbreviations.Mo')
            </th>
            <th>
                @lang('dates.week-days-abbreviations.Tu')
            </th>
            <th>
                @lang('dates.week-days-abbreviations.We')
            </th>
            <th>
                @lang('dates.week-days-abbreviations.Th')
            </th>
            <th>
                @lang('dates.week-days-abbreviations.Fr')
            </th>
            <th>
                @lang('dates.week-days-abbreviations.Sa')
            </th>
        </tr>
        @foreach ($calendar->getWeeks() as $week)

            <tr>
                @foreach($week->getDays() as $day)
                    <td>
                        @if ($day->getDate()->month === $date->month)
                            @if ($day->hasExhibitions())
                                <a class="with-exhibitions day {{ $day->isToday() ? 'today': '' }} {{ $date->day === $day->getNumber() ? 'active': '' }}"
                                   title="@lang('exhibitions.frontend.calendar.exhibitions_in_the_day', ['number' => $day->getExhibitionsNumber()]) "
                                   href="{{ URL::route('exhibition.by_date', $day->getDateInFormatToUrl()) }}">
                                    <span>{{ $day->getNumber() }}</span>
                                </a>
                            @else
                                <div class="none-exhibition day"><a  {{ $day->isToday() ? 'today': '' }} {{ $date->day === $day->getNumber() ? 'active': '' }}"
                                title="No hay exhibiciones en este día">
                                    <span>{{ $day->getNumber() }}</span>
                                </a></div>
                            @endif
                        @else
                            <div class="disabled day"><span>{{ $day->getNumber() }}</span></div>
                        @endif
                    </td>
                @endforeach
            </tr>
        @endforeach
    </table>
</div>