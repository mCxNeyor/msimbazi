<div>
    @section('about', 'active') 

    <div class="container mt-5">
        <h2 class="text-center mb-4">Turbidity Scale and Water Quality</h2>

                
            <table class="table table-bordered table-hover text-center">
                <thead class="table-dark">
                    <tr>
                        <th>NTU (Turbidity Level)</th>
                        <th>Water Quality</th>
                        <th>Description</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Turbidity levels with accurate color coding -->
                    <tr class="excellent">
                        <td style="background-color: #55BF3B;" class="text-white">0.0 - 1.0 NTU</td>
                        <td>Excellent</td>
                        <td>Clear, suitable for drinking water.</td>
                    </tr>
                    <tr class="good">
                        <td style="background-color: #DDDF0D;" class="text-dark">1.0 - 5.0 NTU</td>
                        <td>Good</td>
                        <td>Slightly cloudy, suitable for most uses.</td>
                    </tr>
                    <tr class="fair">
                        <td style="background-color: #FFCC00;" class="text-dark">5.0 - 10.0 NTU</td>
                        <td>Fair</td>
                        <td>Cloudy, may need filtration for drinking.</td>
                    </tr>
                    <tr class="poor">
                        <td style="background-color: #FF8C00;" class="text-white">10.0 - 25.0 NTU</td>
                        <td>Poor</td>
                        <td>Very cloudy, not suitable for drinking.</td>
                    </tr>
                    <tr class="very-poor">
                        <td style="background-color: #DF5353;" class="text-white">25.0 - 50.0 NTU</td>
                        <td>Very Poor</td>
                        <td>Murky, requires heavy treatment.</td>
                    </tr>
                    <tr class="unsafe">
                        <td style="background-color: #C03C3C;" class="text-white">> 50.0 NTU</td>
                        <td>Highly Contaminated</td>
                        <td>Extremely cloudy, often due to pollution.</td>
                    </tr>
                </tbody>
            </table>     
        </div>

        <div class="container mt-5">
            <h2 class="text-center mb-4">Electrical Conductivity (EC) and Water Quality</h2>
                
            <table class="table table-bordered table-hover text-center">
                <thead class="table-dark">
                    <tr>
                        <th>EC (µS/cm)</th>
                        <th>Water Quality</th>
                        <th>Description</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- EC levels with accurate color coding -->
                    <tr class="excellent">
                        <td style="background-color: #55BF3B;" class="text-white">0 - 500 µS/cm</td>
                        <td>Excellent</td>
                        <td>Low mineral content, suitable for drinking, agriculture, and aquaculture.</td>
                    </tr>
                    <tr class="good">
                        <td style="background-color: #DDDF0D;" class="text-dark">500 - 1,500 µS/cm</td>
                        <td>Fair</td>
                        <td>Suitable for most uses, but may cause scaling in pipes.</td>
                    </tr>
                    <tr class="poor">
                        <td style="background-color: #FF8C00;" class="text-white">1,500 - 3,000 µS/cm</td>
                        <td>Poor</td>
                        <td>High mineral content, may affect health, requires treatment for drinking.</td>
                    </tr>
                    <tr class="very-poor">
                        <td style="background-color: #DF5353;" class="text-white">> 3,000 µS/cm</td>
                        <td>Unsafe</td>
                        <td>Extremely high concentration of salts and minerals, not suitable for drinking or agriculture without treatment.</td>
                    </tr>
                </tbody>
            </table>
            
        </div>


        <div class="container mt-5">
            <h2 class="text-center mb-4">TDS Scale and Water Quality</h2>
            <table class="table table-bordered table-hover text-center">
                <thead class="table-dark">
                    <tr>
                        <th>TDS (mg/L or ppm)</th>
                        <th>Water Quality</th>
                        <th>Description</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- TDS levels with accurate color coding -->
                    <tr class="excellent">
                        <td style="background-color: #55BF3B;" class="text-white">0 - 300 mg/L</td>
                        <td>Excellent</td>
                        <td>Low mineral content, suitable for drinking, agriculture, and aquaculture.</td>
                    </tr>
                    <tr class="good">
                        <td style="background-color: #DDDF0D;" class="text-dark">300 - 600 mg/L</td>
                        <td>Good</td>
                        <td>Suitable for drinking and agriculture, may have slight mineral taste.</td>
                    </tr>
                    <tr class="fair">
                        <td style="background-color: #FFCC00;" class="text-dark">600 - 1,000 mg/L</td>
                        <td>Fair</td>
                        <td>Noticeable mineral taste, requires treatment for drinking.</td>
                    </tr>
                    <tr class="poor">
                        <td style="background-color: #FF8C00;" class="text-white">1,000 - 2,000 mg/L</td>
                        <td>Poor</td>
                        <td>High mineral content, not suitable for drinking or agriculture without treatment.</td>
                    </tr>
                    <tr class="very-poor">
                        <td style="background-color: #DF5353;" class="text-white">> 2,000 mg/L</td>
                        <td>Unsafe</td>
                        <td>Highly mineralized, unsuitable for drinking, agriculture, or most uses without extensive treatment.</td>
                    </tr>
                </tbody>
            </table>
            
        </div>    


        <div class="container mt-5">
            <h2 class="text-center mb-4">pH Scale and Water Quality</h2>
        
            <table class="table table-bordered table-hover text-center">
                <thead class="table-dark">
                    <tr>
                        <th>pH Range</th>
                        <th>Water Quality</th>
                        <th>Description</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Excellent/Ideal Range (Green) -->
                    <tr style="background-color: #55BF3B; color: white;">
                        <td>6.5 - 8.5</td>
                        <td>Excellent / Good</td>
                        <td>Ideal for most aquatic life, agriculture, and drinking water. Neutral pH ensures safe usage.</td>
                    </tr>
                    <!-- Fair Range (Yellow) -->
                    <tr style="background-color: #DDDF0D; color: black;">
                        <td>5.5 - 6.5</td>
                        <td>Fair</td>
                        <td>Slightly acidic, may affect certain crops or aquatic organisms, but generally acceptable.</td>
                    </tr>
                    <!-- Poor Range (Orange) -->
                    <tr style="background-color: #FF8C00; color: white;">
                        <td>4.5 - 5.5</td>
                        <td>Poor</td>
                        <td>Highly acidic, can cause harm to aquatic life and crops, requires attention or treatment.</td>
                    </tr>
                    <!-- Very Poor Range (Red) -->
                    <tr style="background-color: #DF5353; color: white;">
                        <td>3.0 - 4.5</td>
                        <td>Very Poor</td>
                        <td>Unhealthy pH levels that are highly acidic and unsuitable for most uses without neutralization.</td>
                    </tr>
                    <!-- Unsafe Range (Dark Red) -->
                    <tr style="background-color: #C03C3C; color: white;">
                        <td>1.0 - 3.0</td>
                        <td>Unsafe</td>
                        <td>Extremely acidic, poses a danger to aquatic life, human health, and infrastructure.</td>
                    </tr>
                    <!-- Alkaline Fair Range (Light Blue) -->
                    <tr style="background-color: #55C1F3; color: black;">
                        <td>8.5 - 11.5</td>
                        <td>Alkaline - Fair</td>
                        <td>Slightly alkaline, suitable for agricultural and industrial use. May impact some sensitive aquatic organisms.</td>
                    </tr>
                    <!-- Alkaline Poor Range (Blue) -->
                    <tr style="background-color: #00A9E5; color: white;">
                        <td>11.5 - 12.5</td>
                        <td>Alkaline - Poor</td>
                        <td>Strongly alkaline, can affect plant growth and aquatic life. May require adjustment.</td>
                    </tr>
                    <!-- Alkaline Unsafe Range (Dark Blue) -->
                    <tr style="background-color: #004F99; color: white;">
                        <td>> 12.5</td>
                        <td>Alkaline - Unsafe</td>
                        <td>Excessively alkaline, can cause severe harm to plants, animals, and infrastructure.</td>
                    </tr>
                </tbody>
            </table>
        </div>
        
</div>
