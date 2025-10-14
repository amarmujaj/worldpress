import Link from "next/link"
import { Button } from "@/components/ui/button"
import { Card, CardContent } from "@/components/ui/card"
import { ArrowLeft, Calendar, Gauge, Fuel, Cog } from "lucide-react"

const motorcycleDetails = {
  1: {
    name: "Yamaha YZF-R1",
    category: "Sport",
    price: 18499,
    year: 2024,
    mileage: 0,
    engine: "998cc Inline-4",
    transmission: "6-Speed",
    fuelType: "Gasoline",
    color: "Racing Blue",
    description:
      "The Yamaha YZF-R1 represents the pinnacle of superbike engineering. With its crossplane crankshaft engine and advanced electronics package, this machine delivers unparalleled performance on both street and track.",
    features: [
      "Crossplane Crankshaft Engine",
      "Quick Shift System",
      "Traction Control",
      "ABS Braking System",
      "LED Lighting",
      "TFT Display",
    ],
    images: ["/yamaha-r1-sport-motorcycle-side-view.jpg", "/yamaha-r1-front-view-racing.jpg", "/yamaha-r1-dashboard-cockpit.jpg"],
  },
}

export default function BikeDetailPage({ params }: { params: { id: string } }) {
  const bike = motorcycleDetails[1] // In a real app, you'd fetch based on params.id

  return (
    <main className="min-h-screen pt-16">
      <section className="py-8 bg-card border-b border-border">
        <div className="container mx-auto px-4 lg:px-8">
          <Button asChild variant="ghost" size="sm" className="mb-4">
            <Link href="/inventory">
              <ArrowLeft className="mr-2 h-4 w-4" /> Back to Inventory
            </Link>
          </Button>
        </div>
      </section>

      <section className="py-12">
        <div className="container mx-auto px-4 lg:px-8">
          <div className="grid grid-cols-1 lg:grid-cols-2 gap-12">
            <div className="space-y-4">
              <div className="relative h-96 rounded-lg overflow-hidden">
                <img
                  src={bike.images[0] || "/placeholder.svg"}
                  alt={bike.name}
                  className="w-full h-full object-cover"
                />
              </div>
              <div className="grid grid-cols-2 gap-4">
                {bike.images.slice(1).map((image, index) => (
                  <div
                    key={index}
                    className="relative h-48 rounded-lg overflow-hidden cursor-pointer hover:opacity-80 transition-opacity"
                  >
                    <img
                      src={image || "/placeholder.svg"}
                      alt={`${bike.name} view ${index + 2}`}
                      className="w-full h-full object-cover"
                    />
                  </div>
                ))}
              </div>
            </div>

            <div>
              <div className="mb-6">
                <div className="text-sm text-muted-foreground mb-2">{bike.category}</div>
                <h1 className="text-4xl font-bold mb-4">{bike.name}</h1>
                <div className="text-4xl font-bold text-primary mb-6">${bike.price.toLocaleString()}</div>
              </div>

              <Card className="mb-6">
                <CardContent className="p-6">
                  <div className="grid grid-cols-2 gap-4">
                    <div className="flex items-center gap-3">
                      <Calendar className="h-5 w-5 text-muted-foreground" />
                      <div>
                        <div className="text-sm text-muted-foreground">Year</div>
                        <div className="font-semibold">{bike.year}</div>
                      </div>
                    </div>
                    <div className="flex items-center gap-3">
                      <Gauge className="h-5 w-5 text-muted-foreground" />
                      <div>
                        <div className="text-sm text-muted-foreground">Mileage</div>
                        <div className="font-semibold">{bike.mileage.toLocaleString()} mi</div>
                      </div>
                    </div>
                    <div className="flex items-center gap-3">
                      <Cog className="h-5 w-5 text-muted-foreground" />
                      <div>
                        <div className="text-sm text-muted-foreground">Engine</div>
                        <div className="font-semibold">{bike.engine}</div>
                      </div>
                    </div>
                    <div className="flex items-center gap-3">
                      <Fuel className="h-5 w-5 text-muted-foreground" />
                      <div>
                        <div className="text-sm text-muted-foreground">Fuel Type</div>
                        <div className="font-semibold">{bike.fuelType}</div>
                      </div>
                    </div>
                  </div>
                </CardContent>
              </Card>

              <div className="mb-6">
                <h2 className="text-2xl font-bold mb-4">Description</h2>
                <p className="text-muted-foreground leading-relaxed">{bike.description}</p>
              </div>

              <div className="mb-8">
                <h2 className="text-2xl font-bold mb-4">Features</h2>
                <ul className="grid grid-cols-1 sm:grid-cols-2 gap-3">
                  {bike.features.map((feature, index) => (
                    <li key={index} className="flex items-center gap-2">
                      <div className="w-1.5 h-1.5 rounded-full bg-primary" />
                      <span className="text-muted-foreground">{feature}</span>
                    </li>
                  ))}
                </ul>
              </div>

              <div className="flex flex-col sm:flex-row gap-4">
                <Button asChild size="lg" className="flex-1">
                  <Link href="/contact">Schedule Test Ride</Link>
                </Button>
                <Button asChild size="lg" variant="outline" className="flex-1 bg-transparent">
                  <Link href="/contact">Contact Us</Link>
                </Button>
              </div>
            </div>
          </div>
        </div>
      </section>
    </main>
  )
}
